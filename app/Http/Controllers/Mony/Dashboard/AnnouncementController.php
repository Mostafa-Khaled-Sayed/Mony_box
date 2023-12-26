<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\EditAnnouncementlRequest;
use App\Http\Requests\Announcement\StoreAnnouncementlRequest;
use App\Models\Datanormale;
use App\Models\Imageannouncement;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
class AnnouncementController extends Controller
{
    /** 
     * Display a listing of the resource.
     */

  function __construct()
  {
    $this->middleware('permission:الإعلانات', ['only' => ['index', 'show']]);
    $this->middleware('permission:اضافة اعلان', ['only' => ['store']]);
    $this->middleware('permission:تعديل الاعلان', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف الاعلان', ['only' => ['destroy']]);
  }
    public function index()
    {
      $datas=Datanormale::all();
      $Announcements= announcement::paginate(5);
      if($datas->count()==0){
            toastr()->success('يجب اضافة  الباقة الطبيعية اولا');
        return redirect(url('/dataNormal'));
      }
      return view('admin.announcement.Announcement_table', compact('Announcements','datas'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementlRequest  $request)
    {

    //  return $request;
    
        if($request->file('img'))
        {
    
            $Announcements = announcement::all();
            $file = $request->file('img');
            $file->move('upload/Announcement/img',$file->getClientOriginalName()); // mov file in public
            $img_name = $file->getClientOriginalName();

            $announcement=  Announcement::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'file_name'=>$img_name,
            'Created_by' => Auth::user()->name,
            'Status'=> 'img',
            'orderNumber' => count($Announcements),
            'orderTotal' => $request->orderTotal,

            ]);
      // $announcement->datanormals()->attach($request->datanormale_id);

      // move pic
      Notification::create([
        'admin_id' => auth()->guard('admin')->user()->id,
        'message' => " قام باضافة اعلان رقم".' ' . $announcement->id,

        'status' => 'جاهزه',
        'created_at' => date('d-m-Y'),
      ]);
     
            toastr()->success('تم حفظ البيانات بنجاح ');

            return back();

        }



        if($request->file('veduo_file'))
        {

      $Announcements= announcement::all();
                $file = $request->file('veduo_file');
                $file->move('upload/Announcement/viduo',$file->getClientOriginalName()); // mov file in public
               $name_vedio= $file->getClientOriginalName();
            $announcement= Announcement::create([
                'name'=>$request->name,
            'description'=>$request->description,
                'file_name'=>$name_vedio,
                'Created_by' => Auth::user()->name,
                'Status'=> 'veduo',
        'orderNumber' => count($Announcements),
        'orderTotal' => $request->orderTotal,

            ]);
      // $announcement->datanormals()->attach($request->datanormale_id)  ;

      Notification::create([
        'admin_id' => auth()->guard('admin')->user()->id,
        'message' => " قام باضافة اعلان رقم" . ' ' . $announcement->id,

        'status' => 'جاهزه',
        'created_at' => date('d-m-Y'),
      ]);
            toastr()->success('تم حفظ البيانات بنجاح ');
            return back();

        }

      // end creat veduo_file

      // START creat url
      if(isset($request['url']))
      {
      $Announcements = announcement::all();
              $link = $request->file('url');
            //   $file_name = $link->getClientOriginalName();
            $announcement=  Announcement::create([
              'name'=>$request->name,
            'description'=>$request->description,
              'file_name'=>$request->url,
              'Created_by' => Auth::user()->name,
              'Status'=> 'link',
        'orderNumber' => count($Announcements),
        'orderTotal' => $request->orderTotal,

          ]);
      // $announcement->datanormals()->attach($request->datanormale_id);


      Notification::create([
        'admin_id' => auth()->guard('admin')->user()->id,
        'message' => " قام باضافة اعلان رقم" . ' ' . $announcement->id,

        'status' => 'جاهزه',
        'created_at' => date('d-m-Y'),
      ]);
          toastr()->success('تم حفظ البيانات بنجاح ');
          return back();

      }

    // end creat veduo_file





    }

    /**
     * Display the specified resource.
     */
    public function show(announcement $announcement)
    {
        $Announcement= announcement::where('id',$announcement->id)->get();
       $attachments = Imageannouncement::where('announcement_id', $announcement->id)->get();
       return view('admin.announcement.show' , compact('Announcement' , 'attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditAnnouncementlRequest $request )
    {

        $announcement = Announcement::findOrfail($request->id);
        $announcement->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

    Notification::create([
      'admin_id' => auth()->guard('admin')->user()->id,

      'message' => " قام بتحديث اعلان رقم" . ' ' . $announcement->id,
      'status' => 'جاهزه',
      'created_at' => date('d-m-Y'),
    ]);
        toastr()->success('تم تعديل البيانات بنجاح ');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
        // return $request;
        $id = $request->id;
    Notification::create([
      'admin_id' => auth()->guard('admin')->user()->id,

      'message' => " قام بحذف اعلان رقم" . ' ' . $id,
      'status' => 'جاهزه',
      'created_at' => date('d-m-Y'),
    ]);
        Announcement::find($id)->delete();
        toastr()->success('تم حذف البيانات بنجاح ');
        return back();
    }
}
