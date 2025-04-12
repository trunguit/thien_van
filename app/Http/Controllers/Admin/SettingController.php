<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit(GeneralSettings $settings)
    {
        return view('admin.settings.edit', [
            'settings' => $settings
        ]);
    }

    public function update(Request $request, GeneralSettings $settings)
    {
        $validated = $request->validate([
            'phone1' => 'nullable|string',
            'phone2' => 'nullable|string',
            'email1' => 'nullable|email',
            'email2' => 'nullable|email',
            'facebook' => 'nullable|url',
            'shoppe' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'introduction' => 'nullable|string',
            'copyright' => 'nullable|string',
        ]);

        // Xử lý upload logo
        if ($request->hasFile('logo')) {
            $file_logo = $request->file('logo');
            $destinationPath = 'uploads/settings/';
            $extension = $file_logo->getClientOriginalExtension();
            $newFilename = 'logo'  . $extension;
            $file_logo->move(public_path($destinationPath), $newFilename);
            $settings->logo = $destinationPath.$newFilename;
        }
        if ($request->hasFile('favicon')) {
            $file_favicon = $request->file('favicon');
            $destinationPath = 'uploads/settings/';
            $extension = $file_favicon->getClientOriginalExtension();
            $newFilename = 'favicon'  . $extension;
            $file_favicon->move(public_path($destinationPath), $newFilename);
            $settings->favicon = $destinationPath.$newFilename;
        }
        // Cập nhật các trường khác
        foreach (['phone1','phone2', 'email1','email2', 'facebook', 'shoppe','copyright', 'address', 'meta_description', 'meta_title', 'introduction'] as $field) {
            $settings->$field = $validated[$field] ?? null;
        }

        $settings->save(); // Lưu tất cả thay đổi

        return back()->with('success', 'Cập nhật thành công!');
    }
}
