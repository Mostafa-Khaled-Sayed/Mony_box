<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Notification;
class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'email' => ['required'],
            'facebook' => ['required'],
            'twitter' => ['required'],
            'instegram' => ['required'],
        ]);
        $data_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('logo')) {

            $image = $request->file('logo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/logo'), $image_name);

            $save_url = 'upload/logo/' . $image_name;
            if (file_exists($old_image)) {

                unlink($old_image);
            }
            Setting::findOrFail($data_id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instegram' => $request->instegram,
                'logo' => $save_url

            ]);
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام بتغيير الاعدادات",

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
            toastr()->success('تم تعديل البيانات بنجاح ');
            return back();
        } else {

           Setting::findOrFail($data_id)->update([

                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instegram' => $request->instegram,
                'logo' => $old_image
                

            ]);
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام بتغيير الاعدادات",

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
            toastr()->success('تم تعديل البيانات بنجاح ');
            return back();
        }

}



}