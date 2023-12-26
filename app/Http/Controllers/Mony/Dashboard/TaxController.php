<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\Notification;
class TaxController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ضريبة التحويل' ,['only' => ['index' , 'update']]);
         $this->middleware('permission:تعديل ضريبة التحويل', ['only' => ['update']]);
      
    }

    public function index(){
        $taxs= Tax::all();
     return view('admin.tax.index' , compact('taxs'))   ;
    }

    public function update(Request $request)
    {
      $request->validate([
       'tax'=> ['required',  'numeric' , 'max:100']
      ]);

        Tax::findOrFail($request->id)->update([
            'tax' => $request->tax,


        ]);
        Notification::create([
            'admin_id' => auth()->guard('admin')->user()->id,
            'message' => "قام بتغيير  قيمة الضريبة",

            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
        toastr()->success('تم حفظ البيانات بنجاح ');
        return back();
    }
}
