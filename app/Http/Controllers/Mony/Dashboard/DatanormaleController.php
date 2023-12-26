<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Datanormale;
use Illuminate\Http\Request;
use App\Http\Requests\Normal\StoreNormalRequest;
use App\Models\Notification;
use App\Http\Requests\Normal\EditNormalRequest;
class DatanormaleController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:الباقات الطبيعية', ['only' => ['index']]);
        $this->middleware('permission:اضافة باقة طبيعية', ['only' => ['store', 'create']]);
        $this->middleware('permission:تعديل الباقة الطبيعية', ['only' => ['update']]);
        $this->middleware('permission:حذف الباقة الطبيعية', ['only' => ['delete']]);
    }
    public function index()
    {
        $datas = Datanormale::paginate(5);
   
        return view('admin.datanormal.index',compact('datas'));
    }
    // start store
    public function store(StoreNormalRequest $request)
    {


        if ($request->file('photo')) {


            $image = $request->file('photo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/dataNormal'), $image_name);

            $save_url = 'upload/dataNormal/' . $image_name;

            $data= Datanormale::create([
            
              'title'=>$request->title,
              'starting_price'=>$request->starting_price,
              'final_price'=>$request->final_price,
               'income'=>$request->income,
              'starting_income'=> $request->starting_price * $request->income,
              'final_income'=>  $request->final_price * $request->income,
              
              'desc'=>$request->desc ,
            'photo' => $save_url  
             ]);
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام باضافة  باقة طبيعية رقم" . ' ' . $data->id,

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);

             toastr()->success('تم حفظ البيانات بنجاح ');
             return back();
                 }
      
                }





// Method  update
public function  update(EditNormalRequest $request){
    $data_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('photo')) {

            $image = $request->file('photo');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/dataNormal'), $image_name);

            $save_url = 'upload/dataNormal/' . $image_name;
            if (file_exists($old_image)) {

                unlink($old_image);
            }
          $data=  Datanormale::findOrFail($data_id)->update([

                'title' => $request->title,
                'starting_price' => $request->starting_price,
                'final_price' => $request->final_price,
                'starting_income' => $request->starting_price * $request->income,
                'final_income' =>  $request->final_price * $request->income,
                'income' => $request->income,
                'desc' => $request->desc,
                'photo' => $save_url
            ]);

            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام بتحديث  باقة طبيعية رقم" . ' ' . $data_id ,

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
            toastr()->success('تم تعديل البيانات بنجاح ');
            return back();
        } else {

           $data= Datanormale::findOrFail($data_id)->update([

                'title' => $request->title,
                'starting_price' => $request->starting_price,
                'final_price' => $request->final_price,
                'starting_income' => $request->starting_price * $request->income,
                'final_income' =>  $request->final_price * $request->income,
                'income' => $request->income,
                'desc' => $request->desc,
                'photo'=> $old_image

            ]);
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام بتحديث  باقة طبيعية رقم" . ' ' . $data_id ,

                'status' => 'جاهزه',
               
            ]);
            toastr()->success('تم تعديل البيانات بنجاح ');
            return back();
        }
    }
       
 
 // End Method  update



     // End Method delete

     public function delete(Request $request){
        $data = Datanormale::findOrFail($request->id);
        $img = $data->photo;
        unlink($img); 
        Datanormale::findOrFail($request->id)->delete();
        Notification::create([
            'admin_id' => auth()->guard('admin')->user()->id,
            'message' => " قام بحذف  باقة طبيعية رقم" . ' ' . $data->id,

            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
        toastr()->success('تم حذف البيانات بنجاح ');
        return back();

    }// End Method 
 

}


    

  

