<?php

namespace App\Http\Controllers\Recharge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\racharch\Package;
use Illuminate\Support\Facades\Storage;

class ReachargepakageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "ssuccess";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function DeleteAttachment($disk,$path){
Storage::disk($disk)->delete($path);
return 1;
          
      }
         public function veryfiedandStoreImage( $request,$inputname,$foldername,$disk){
if($request->hasFile($inputname)){
if(!$request->file($inputname)->isValid()){
    flash('Invalid Image!')->error()->important();
    return redirect()->back()->withInput();
}
$photo=$request->file($inputname);
$name=\Str::slug($request->input('name'));
$fileName=$name.'.'.$photo->getClientOriginalExtension();
}
             $request->file($inputname)->storeAs($foldername,$fileName,$disk);
             return $fileName;
         }
    public function store(Request $request)
    {
        $validated = $request->validate([
        'charge' => 'required',
        'photo' => 'required|mimes:jpeg,png,jpg,gif,svg',
        'identifiedcharge' => 'required',
        'status' => 'required',
        'price' => 'required',
        'valite' => 'required',
        'samplercharge' => 'required',
        'description' => 'required',
        'type' => 'required',
        'name' => 'required',
    ]);
        $photo=$this->veryfiedandStoreImage( $request,"photo","photo","imageCountry");
       $package= Package::create([
            "photo"=>$photo,
            'company_incountrie_id'=>$request->charge,
            "identifiedcharge"=>$request->identifiedcharge,
            "status"=>$request->status,
            "price"=>$request->price,
            "valite"=>$request->valite,
            "samplercharge"=>$request->samplercharge,
            "description"=>$request->description,
            "type"=>$request->type,
            "name"=>$request->name,
            ]);
            return redirect()->route('package.index');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       $Packagedata= Package::findOrFail($id);
       return view('admin.recharge.dashboard-updatePackage',compact('Packagedata'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
        'charge' => 'required',
        'identifiedcharge' => 'required',
        'status' => 'required',
        'price' => 'required',
        'valite' => 'required',
        'samplercharge' => 'required',
        'description' => 'required',
        'type' => 'required',
        'name' => 'required',
    ]);
       $package= Package::findOrFail($id)->update([
            'company_incountrie_id'=>$request->charge,
            "identifiedcharge"=>$request->identifiedcharge,
            "status"=>$request->status,
            "price"=>$request->price,
            "valite"=>$request->valite,
            "samplercharge"=>$request->samplercharge,
            "description"=>$request->description,
            "type"=>$request->type,
            "name"=>$request->name,
            ]);
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
       public function changImage(Request $request)
    {
                 $validated = $request->validate([
       "photo"=>"required|mimes:jpeg,png,jpg,gif,svg",
    ]);
        $data=Package::findOrFail($request->id);
        $this->DeleteAttachment('imageCountry','/photo/'.$data->photo);
        $image=$this->veryfiedandStoreImage( $request,"photo","photo","imageCountry");
        $data->update([
            'photo'=>$image,
            ]);
        return back();
    }
    public function destroy($id)
    {
        $data=Package::findOrFail($id);
        $this->DeleteAttachment('imageCountry','/photo/'.$data->photo);
        $data->delete();
        return back();
    }
}
