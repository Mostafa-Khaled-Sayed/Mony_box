<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Notification;
class ImageController extends Controller
{
    function __construct()
    {
        
        $this->middleware('permission:الصور', ['only' => ['index', 'store']]);
        $this->middleware('permission:حذف الصور', ['only' => ['delete']]);

    }
    
    public function index()
    {
        $photos = Image::all();

        return view('admin.Images.index', compact('photos'));
    }
    public function store(Request $request)
    {

        if ($request->file('photo')) {

            $request->validate( [
                'photo' => [
                    'required',
                    'image',
                    'mimes:jpg,png,jpeg,gif,svg',
                    // 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                    'max:2048'
                ],
            ]);
            $image = $request->file('photo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/slider'), $image_name);

            $save_url = 'upload/slider/' . $image_name;


            Image::create([


                'photo' => $save_url
            ]);
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام باضافة  صورة" ,

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
            toastr()->success('تم حفظ البيانات بنجاح ');
            return back();
        
    }else{
            toastr()->error(' ادخل صورة ');
            return back();  
    }
}

    // End Method delete

    public function delete(Request $request)
    {

        $data = Image::findOrFail($request->id);
        $img = $data->photo;
        unlink($img);

       Image::findOrFail($request->id)->delete();
        Notification::create([
            'admin_id' => auth()->guard('admin')->user()->id,
            'message' => " قام بحذف    صوؤة",

            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
        toastr()->success('تم حذف البيانات بنجاح ');
        return redirect()->back();
    }// End Method 

}