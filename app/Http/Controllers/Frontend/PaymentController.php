<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cart;
use Str;

class PaymentController extends Controller
{
    public function index() {
        if(!Session::has('address')) {
            return redirect()->route('user.checkout');
        }
        return view('frontend.pages.payment');
    }

    public function storeOrder($paymentMethod, $paymentStatus, $transactionId, $amount, $currencyName) {
        $settings = GeneralSetting::first();

        $order = new Order();
        $order->invoice_id = "DH".rand(1, 999999);
        $order->user_id=Auth::user()->id;
        $order->sub_total=getCartTotal();
        $order->amount=getFinalPayableAmount();
        $order->currency_name=$settings->currency_name;
        $order->currency_icon = $settings->currency_icon;
        $order->product_qty=\Cart::content()->count();
        $order->payment_method=$paymentMethod;
        $order->payment_status=$paymentStatus;
        $order->order_address=json_encode(Session::get('address'));
        $order->shipping_method=json_encode(Session::get('shipping_method'));
        $order->coupon=json_encode(Session::get('coupon'));
        $order->order_status= 'pending';
        $order->save();

        foreach(\Cart::content() as $productItem) {
            $product = Product::find($productItem->id);
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id=$product->id;
            $orderDetail->product_name=$product->name;
            $orderDetail->variants = json_encode($productItem->options->variants);
            $orderDetail->variant_total= $productItem->options->variants_total;
            $orderDetail->unit_price=$productItem->price;
            $orderDetail->qty = $productItem->qty;
            $orderDetail->save();
        }

        $trans = new Transaction();
        $trans->order_id = $order->id;
        $trans->transaction_id = $transactionId;
        $trans->payment_method = $paymentMethod;
        $trans->amount = getFinalPayableAmount();
        $trans->amount_real_currency = $amount;
        $trans->amount_real_currency_name = $currencyName;
        $trans->save();
    }

    //xoa session khi order thanh cong
    public function clearSession()
    {
        \Cart::destroy();
        Session::forget('address');
        Session::forget('shipping_method');
        Session::forget('coupon');
    }

    public function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }

    public function payWithCod(Request $request) {
        $codPaySetting = CodSetting::first();
        $setting = GeneralSetting::first();
        if($codPaySetting->status == 0){
            return redirect()->back();
        }

        // amount calculation
       $total = getFinalPayableAmount();
       $payableAmount = round($total, 2);


        $this->storeOrder('COD', 0, \Str::random(10), $payableAmount, $setting->currency_name);
        // clear session
        $this->clearSession();

        return redirect()->route('user.payment.success');
    }
}
