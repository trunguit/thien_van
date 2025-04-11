<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use Illuminate\Http\Request;

class CustomerReivewController extends Controller
{
    public function index()
    {
        $customers = CustomerReview::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive',
            'comment' => 'required|string',
            'job' => 'required|string',
            'avatar' => $request->id == 0 ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->id == 0) {
            $customer = new CustomerReview();
        } else {
            $customer = CustomerReview::findOrFail($request->id);
        }

        // Xử lý upload logo
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/customers'), $filename);
            $customer->avatar = 'images/customers/' . $filename;
        } elseif ($request->id == 0) {
            return redirect()->back()->with('error', 'Vui lòng chọn avatar khách hàng.');
        }

        $customer->name = $request->name;
        $customer->job = $request->job;
        $customer->comment = $request->comment;
        $customer->status = $request->status;
        $customer->save();

        return redirect()->back()->with('success', $request->id == 0 ? 'Thêm bình luận thành công.' : 'Cập nhật bình luận thành công.');
    }

    public function show(Request $request)
    {
        $partner = CustomerReview::findOrFail($request->id);
        return response()->json($partner);
    }
    public function destroy($id)
    {
        $partner = CustomerReview::findOrFail($id);
        if ($partner->logo) {
            // Xóa logo nếu có
            @unlink(public_path($partner->logo));
        }
        $partner->delete();
        return redirect()->back()->with('success', 'Xóa bình luận thành công.');
    }
}
