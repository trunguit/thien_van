<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function details($id)
    {
        $order = Order::find($id);
        return view('admin.orders.details', compact('order'));
    }

    public function update(Request $request)
    {
        $order = Order::find($request->id);
        $order->note = $request->note;
        $order->save();
        return redirect()->back()->with('success', 'Cập nhật ghi chú thành công');
    }
}
