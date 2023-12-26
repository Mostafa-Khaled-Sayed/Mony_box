<?php

namespace App\Http\Controllers\Recharge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\racharch\PackagePrice;
use App\Models\racharch\RechargeCountry;
class ReachargePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
         return "succes";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        'imagebackground' => 'required|mimes:jpeg,png,jpg,gif,svg',
        'identified_code' => 'required',
        'status' => 'required',
        'price' => 'required',
        'validate' => 'required',
        'simble_reacherage' => 'required',
        'description' => 'required',
        'type' => 'required',
        'name' => 'required',
    ]);
        $image= $this->veryfiedandStoreImage( $request,'image','image','imageCountry');
         $backgroundcountry=$this->veryfiedandStoreImage( $request,'imagebackground','imagebackground','backgroundcountry');
      PackagePrice::create([
          'name'=>$request->name,
          'company'=>$request->name,
          'status'=>$request->status,
          'imagebackground'=>$backgroundcountry,
          'image'=>$image,
          'simble_reacherage'=>$request->simble_reacherage,
          'identified_code'=>$request->identified_code,
          'validate'=>$request->validate,
          'company_incountrie_id'=>$request->charge,
          'price'=>$request->price,
          'description'=>$request->description,
          ]);
          return redirect()->route('packageprice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
               $data= RechargeCountry::with('companyIncountry.Package','companyIncountry.PackagePrice')->findOrFail($id);
              
         return view('admin.recharge.index',compact('data'));
    }
    public function changebackground( Request $request)
    {
         $validated = $request->validate([
        'imagebackground' => 'required|mimes:jpeg,png,jpg,gif,svg',
    ]);
               $data= PackagePrice->findOrFail($request->id);
            $this->   DeleteAttachment('backgroundcountry','/imagebackground/'.$valu->imagebackground);
            
         $backgroundcountry=$this->veryfiedandStoreImage( $request,'imagebackground','imagebackground','backgroundcountry');
                            $data->update(['imagebackground'=>$backgroundcountry]);
         return redirect()->back();
    }
    public function changeImage( Request $request)
    {
         $validated = $request->validate([
        
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
       
    ]);
               $data= PackagePrice->findOrFail($request->id);
 $this->DeleteAttachment('backgroundcountry','/image/'.$valu->image);
 $image= $this->veryfiedandStoreImage( $request,'image','image','imageCountry');
              $data->update(['image'=>$image]);
return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
     $pricedate= PackagePrice::findOrfail($id);
     return view('admin.recharge.dashboard-updatePrice',compact('pricedate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
        'charge' => 'required',
        'identified_code' => 'required',
        'status' => 'required',
        'price' => 'required',
        'validate' => 'required',
        'simble_reacherage' => 'required',
        'description' => 'required',
        'type' => 'required',
        'name' => 'required',
    ]);
 PackagePrice::findOrfail($request->id)->update([
          'name'=>$request->name,
          'company'=>$request->name,
          'status'=>$request->status,
          'simble_reacherage'=>$request->simble_reacherage,
          'identified_code'=>$request->identified_code,
          'validate'=>$request->validate,
          'company_incountrie_id'=>$request->charge,
          'price'=>$request->price,
          'description'=>$request->description,
          ]);
          toastr()->success('update success');
          return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
 $valu=PackagePrice::findOrfail($id);
 $this->DeleteAttachment('imageCountry','/imagebackground/'.$valu->imagebackground);
 $this->DeleteAttachment('backgroundcountry','/image/'.$valu->image);
 $valu->delete();
 toastr()->error('delete success');
 return redirect()->back();
    }
}
