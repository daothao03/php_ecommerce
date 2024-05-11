<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function cartView() {
        $cartItems = Cart::content();

        Session::forget('coupon');
        if(count($cartItems) === 0) {
            toastr('Cart is empty!','warning', 'Warning');
            return redirect() -> route('home');
        }

        // dd( $cartItems);
        return view('frontend.pages.cart_view', compact('cartItems'));
    }

    public function addToCart(Request $request) {
        $product = Product::findOrFail($request->product_id);

        if($product->qty === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
        }elseif($product->qty < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        }

        $variants = [];
        $variantAmount = 0;

        if($request->has('variants_items')){
            foreach($request->variants_items as $item_id){
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantAmount += $variantItem->price;
            }
        }

        $price = 0;

        if(checkDiscount($product)) {
            $price = $product->offer_price ;
        } else {
            $price = $product->price ;
        }

        $cart = [];
        $cart['id'] = $product->id;
        $cart['name'] = $product->name;
        $cart['qty'] = $request->qty;
        $cart['price'] = $price;
        $cart['weight'] = 100;
        $cart['options']['variants'] = $variants;
        $cart['options']['variants_total'] = $variantAmount;
        $cart['options']['image'] = $product->thumb_image;
        $cart['options']['slug'] = $product->slug;

        Cart::add($cart);

        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    public function updateQty(Request $request) {

        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);

        if($product->qty === 0){
            return response(['status' => 'error', 'message' => 'Product sold out']);
        }elseif($product->qty < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        }

        Cart::update($request->rowId, $request->quantity);

        $prodTotal = $this -> getProductTotal($request->rowId);

        return response(['status' => 'success', 'message' => 'Product Quantity Updated!', 'product_total' => $prodTotal]);
    }

    /** get product total */
    public function getProductTotal($rowId)
    {
       $product = Cart::get($rowId);
       $total = ($product->price + $product->options->variants_total) * $product->qty;
       return $total;
    }

    /** get cart total amount */
    public function cartTotal()
    {
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    //xoa tat ca sp trong gio
    public function removeCart() {
        Cart::destroy();

        return response(['status' => 'success', 'message' => 'Removed your cart successfully!']);
    }

    //xoa tung sp
    public function removeProduct($rowId) {
        Cart::remove($rowId);

        toastr('Removed successfully!','success', 'Success');

        return redirect()->back();
    }

    //dem slg sp trong gio
    public function cartCount() {
        return Cart::content()->count();
    }


    //lay ve sp trong sidebar
    public function getCartSidebar() {
        return Cart::content();
    }

    //xoa sp trong sidebar
    public function removeSidebarCartProd(Request $request) {
        Cart::remove($request->rowId);

        return response(['status' => 'success', 'message' => 'Removed successfully!']);
    }

    //ap dung phieu giam gia trong cart
    public  function applyCoupon(Request $request) {
        if($request->coupon_code === null) {
            return response(['status' => 'error', 'message' => 'Coupon code is empty']);
        }

        $coupon = Coupon::where('status', 1)
                    ->where('code',$request->coupon_code)
                    ->first();
        if($coupon === null) {
            return response(['status' => 'error', 'message' => 'Coupon code does not exist']);
        }elseif($coupon->start_date > date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        }elseif($coupon->end_date < date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon is expired']);
        }elseif($coupon->total_used >= $coupon->quantity){
            return response(['status' => 'error', 'message' => 'you can not apply this coupon']);
        }

        if($coupon->discount_type === 'amount'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount
            ]);
        }elseif($coupon->discount_type === 'percent'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount
            ]);
        }

        return response(['status' => 'success', 'message' => 'Coupon applied successfully!']);
        // dd($coupon);
    }

    //tinh gia tri phieu giam gia
    public function couponCalculation() {
        if(Session::has('coupon')){
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if($coupon['discount_type'] === 'amount'){
                $total = $subTotal - $coupon['discount'];
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            }elseif($coupon['discount_type'] === 'percent'){
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
            }
        }else {
            $total = getCartTotal();
            return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
        }
    }
}
