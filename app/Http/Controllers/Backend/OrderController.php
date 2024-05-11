<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CanceledOrderDataTable;
use App\DataTables\DeliveredDataTable;
use App\DataTables\DropOffDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\ProcessingOrderDataTable;
use App\DataTables\ShippedDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact(
            'order'
        ));
    }

    public function changeOrderStatus(Request $request)
    {
        // dd('hello');
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;

        if ($request->status === 'delivered') {
            $order->payment_status = 1; // Set payment status to 1
        }

        $order->save();
        return response(['status' => 'success', 'message' => 'Change status Successfully!']);
    }

    public function changePaymentStatus(Request $request)
    {
        // dd('hello');
        $payment = Order::findOrFail($request->id);
        $payment->payment_status = $request->status;

        $payment->save();
        return response(['status' => 'success', 'message' => 'Change payment status Successfully!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        $order->orderDetail()->delete();

        $order->transaction()->delete();

        $order->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    //đang chờ xử lý
    public function pending(PendingOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.pending');
    }

    //đang chuẩn bị hàng
    public function processing(ProcessingOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.processing');
    }

    //đã giao cho đơn vị vận chuyển
    public function dropoff(DropOffDataTable $dataTable)
    {
        return $dataTable->render('admin.order.drop-off');
    }

    //đã vận chuyển
    public function shipped(ShippedDataTable $dataTable)
    {
        return $dataTable->render('admin.order.shipped');
    }

    //đã giao
    public function delivered(DeliveredDataTable $dataTable)
    {
        return $dataTable->render('admin.order.delivered');
    }

    //đã hủy
    public function canceled(CanceledOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.shipped');
    }
}
