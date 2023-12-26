<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Imageannouncement;
use Illuminate\Http\Request;

class ImageannouncementsController extends Controller
{

    function __construct()
    {
       
        $this->middleware('permission:اضافة اعلان', ['only' => ['store']]);
     
    }
    public function store(Request $request)
    {
        if ($request->file('photo')) {


            $image = $request->file('photo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/Announcement/attach/img'), $image_name);

            $save_url = 'upload/Announcement/attach/img/' . $image_name;

          

            Imageannouncement::create([
                'announcement_id' => $request->id,
                'photo' => $save_url
            ]);
            toastr()->success('تم حفظ البيانات بنجاح ');

            return back();

        }
    }

    public function delete(Request $request)
    {
        $data = Imageannouncement::findOrFail($request->id);
        $img = $data->photo;
        unlink($img);
        $data->delete();
        toastr()->success('تم حذف البيانات بنجاح ');
        return back();
    }// End Method 
}
