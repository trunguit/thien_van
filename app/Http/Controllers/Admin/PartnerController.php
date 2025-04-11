<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive',
            'logo' => $request->id == 0 ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->id == 0) {
            $partner = new Partner();
        } else {
            $partner = Partner::findOrFail($request->id);
        }

        // Xử lý upload logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/partners'), $filename);
            $partner->logo = 'images/partners/' . $filename;
        } elseif ($request->id == 0) {
            // Nếu là thêm mới mà không có logo, trả về lỗi
            return redirect()->back()->with('error', 'Vui lòng chọn logo đối tác.');
        }

        $partner->name = $request->name;
        $partner->website = $request->website;
        $partner->status = $request->status;
        $partner->save();

        return redirect()->back()->with('success', $request->id == 0 ? 'Thêm đối tác thành công.' : 'Cập nhật đối tác thành công.');
    }

    public function show(Request $request)
    {
        $partner = Partner::findOrFail($request->id);
        return response()->json($partner);
    }
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        if ($partner->logo) {
            // Xóa logo nếu có
            @unlink(public_path($partner->logo));
        }
        $partner->delete();
        return redirect()->back()->with('success', 'Xóa đối tác thành công.');
    }
}
