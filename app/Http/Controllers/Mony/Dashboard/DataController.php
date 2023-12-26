<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auto\StoreAutoRequest;
use App\Models\Notification;
use App\Http\Requests\Auto\EditAutoRequest;
use App\Models\Data;
class DataController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:الباقات الأتوماتيك', ['only' => ['index']]);
        $this->middleware('permission:اضافة باقة أتوماتيك', ['only' => ['store', 'create']]);
        $this->middleware('permission:تعديل الباقة الأتوماتيك', ['only' => ['update']]);
        $this->middleware('permission:حذف الباقة الأتوماتيك', ['only' => ['delete']]);
    }
    public function index()
    {
        $datas = Data::all();
   
        return view('admin.data.index',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutoRequest $request)
    {

   
        if($request->file('photo')){
    

            $image = $request->file('photo');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/data'), $image_name);
                
            $save_url = 'upload/data/'.$image_name;
 
               
       $data= Data::create([
            
              'title'=>$request->title,
            
              'Price'=>$request->price,
              'income'=>$request->income,
              'gift'=>$request->gift,
            'time_end' => $request->time_end,
              
              'desc'=>[
              'ar'=>$request->Desc_ar,
              'en'=>$request->Desc_en,
             
              ],
           
             
             'photo'=> $save_url
             ]);
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام باضافة باقة اتوماتيك رقم" . ' ' . $data->id,

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
     
             toastr()->success('تم حفظ البيانات بنجاح ');
             return redirect(url('/data'));
                 }
    }


   

     // End Method delete

    public function delete(Request $request){

        $data = Data::findOrFail($request->id);
        $img = $data->photo;
        unlink($img ); 

       Data::findOrFail($request->id)->delete();
        Notification::create([
            'admin_id' => auth()->guard('admin')->user()->id,
            'message' => " قام بحذف  باقة اتوماتيك رقم" . ' ' . $data->id,

            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
     
       toastr()->success('تم حذف البيانات بنجاح ');
        return redirect()->back(); 

    }// End Method 



    
   // Method  update
   public function  update(EditAutoRequest $request){
    $data_id = $request->id;
    $old_image = $request->old_image;
  
    if($request->file('photo')){
    

        $image = $request->file('photo');
        $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/data'), $image_name);
            
        $save_url = 'upload/data/'.$image_name;

    if (file_exists($old_image)) {
      
       unlink($old_image);
    }
        $data= Data::findOrFail($data_id)->update([
        'title'=>$request->title,
      
        'Price'=>$request->price,
        'income'=>$request->income,
        'gift'=>$request->gift,
        'time_end' => $request->time_end,
        'desc'=>[
        'ar'=>$request->Desc_ar,
        'en'=>$request->Desc_en,
        ],
     
       
       'photo'=> $save_url
    
    
      ]);

            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
             'message' => " قام بتحديث  باقة اتوماتيك رقم" . ' ' . $request->id,

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
            toastr()->success('تم تعديل البيانات بنجاح ');
            return redirect(url('/data'));
       

    } else {

      $data=  Data::findOrFail($data_id)->update([
            
            'title'=>$request->title,
            
            'Price'=>$request->price,
            'income'=>$request->income,
            'gift'=>$request->gift,
            
            'desc'=>[
            'ar'=>$request->Desc_ar,
            'en'=>$request->Desc_en,
            'fr'=>$request->Desc_fr,
            'it'=>$request->Desc_it,
            'tr'=>$request->Desc_tr,
            'de-At'=>$request->Desc_de,    
            ],
         
           
           'photo'=> $old_image
         
              ]);
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' => " قام بتحديث  باقة اتوماتيك رقم" . ' ' . $data_id,

                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
              toastr()->success('تم تعديل البيانات بنجاح ');
        return redirect(url('/data'));

 }}

  // End Method  update


}
