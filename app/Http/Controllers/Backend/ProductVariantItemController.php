<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductVariantItemDataTable $dataTable, Request $request)
    {

        $product = Product::findOrFail($request -> productID);
        $variant = ProductVariant::findOrFail($request -> variantID);
        return $dataTable->render('admin.product.variant-item.index', compact(
            'product',
            'variant'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $variant = ProductVariant::findOrFail($request -> variant);
        $product = Product::findOrFail($request->product);
        return view('admin.product.variant-item.create', compact(
            'variant',
            'product'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request -> validate([
            'variant_id' => ['integer', 'required'],
            'name' => ['required', 'max:200'],
            'price' => ['integer', 'required'],
            'is_default' => ['required'],
            'status' => ['required']
        ]);

        $variantItem = new ProductVariantItem();
        $variantItem->product_variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.products-variant-item.index',
        ['productID' => $request->product_id, 'variantID' => $request->variant_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variantItem = ProductVariantItem::findOrFail($id);
        return view('admin.product.variant-item.edit', compact(
            'variantItem'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'price' => ['integer', 'required'],
            'is_default' => ['required'],
            'status' => ['required']
        ]);

        $variantItem = ProductVariantItem::findOrFail($id);
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Update Successfully!', 'success', 'success');

        return redirect()->route('admin.products-variant-item.index',
        ['productID' => $variantItem->productVariant->product_id, 'variantID' => $variantItem->product_variant_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variantItem = ProductVariantItem::findOrFail($id);
        $variantItem->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $variantItem = ProductVariantItem::findOrFail($request->id);
        $variantItem -> status = $request -> status == 'true' ? 1:0;

        $variantItem -> save();
        return response(['message' => 'Status has been updated!']);
    }
}
