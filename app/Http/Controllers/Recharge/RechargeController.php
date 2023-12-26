<?php

namespace App\Http\Controllers\Recharge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\racharch\RechargeCountry;
use App\Models\racharch\companyIncountry;
use App\Models\racharch\PackagePrice;
use App\Models\racharch\Package;
use Illuminate\Support\Facades\Storage;


class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCountry=RechargeCountry::all();
      return  view('admin.recharge.dashboard-recharge',compact('allCountry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        
    }
    public function createPackage($id)
    {
       $companydata= RechargeCountry::with('companyIncountry')->findOrFail($id);
        return view('admin.recharge.dashboard-addPackage',compact('companydata'));
    }
    public function createPrice($id)
    {
        $companydata=RechargeCountry::with('companyIncountry')->findOrFail($id);
       
        return view('admin.recharge.dashboard-addPrice',compact('companydata'));
    }

    /**
     * Store a newly created resource in storage.
     */
      public function DeleteAttachment($disk,$path,$id,$fileName){
Storage::disk($disk)->delete($path);
Image::Where('imagable_id',$id)->delete();
          
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

        'countryImage' => 'required|mimes:jpeg,png,jpg,gif,svg',
        'countryBackground' => 'required|mimes:jpeg,png,jpg,gif,svg',
        'status' => 'required',
        'name' => 'required',
    ]);

       $countryImage= $this->veryfiedandStoreImage($request,'countryImage','BackgroundImage','imageCountry',);
       $countryBackground= $this->veryfiedandStoreImage($request,'countryBackground','BackgroundCountry','backgroundcountry',);
        
      $RechargeCountry=  RechargeCountry::create([
            'status'=>$request->status,
            'country_background'=>$countryBackground,
            'country_image'=>$countryImage,
            'country_name'=>$request->name,
            ]);
            if(isset($request->items))
            foreach($request->items as $value)
            companyIncountry::create([
                "name"=>$value,
                "recharge_countrie_id"=>$RechargeCountry->id,
                ]);
                toastr()->success('add contry and company successful');
            return redirect()->back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
        'status' => 'required',
        'name' => 'required',
    ]);
        $RechargeCountry=  RechargeCountry::findOrFail($request->id)->update([
            'status'=>$request->status,
            'country_name'=>$request->name,
            ]);
        
                   if(isset($request->items))
            foreach($request->items as $value)
            companyIncountry::create([
                "name"=>$value,
                "recharge_countrie_id"=>$RechargeCountry->id,
                ]);
                toastr()->success('add contry and update company successful');
            return redirect()->back();
    }
    public function updatecompany(Request $request)
    {
         $validated = $request->validate([
        'name' => 'required',
    ]);
        $RechargeCountry=  companyIncountry::findOrFail($request->id)->update([
                "name"=>$request->name,]);
                toastr()->success('add contry and company successful');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
     if(!companyIncountry::where('recharge_countrie_id',$id)->exists())
       { RechargeCountry::destroy($id);
           toastr()->error('deleted');
           
       }else
           toastr()->error('  you can not deleted');
          return redirect()->back();
        
    }
    public function destroycompany($id)
    {

     if(Package::where('company_incountrie_id',$id)->exists() | PackagePrice::where('company_incountrie_id',$id)->exists() )
           toastr()->error('  you can not deleted');
            else{
              
       companyIncountry::findOrFail($id)->delete();
           toastr()->error('deleted');
                
            }
          return redirect()->back();
        
    }
}
