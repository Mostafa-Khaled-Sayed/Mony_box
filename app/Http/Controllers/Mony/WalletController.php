<?php

namespace App\Http\Controllers\Mony;

use App\Http\Controllers\Controller;
use App\Models\Wallate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('web.Wallet.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'address' => 'required|unique:wallates,address|max:255',
        'phone' => 'required|min:9|max:25|unique:wallates,phone',
        'password' =>'required|min:6',
    ]);
       
       Wallate::create([
            'phone'=>$request->phone,
            'user_id'=>Auth::user()->id,
            'address'=>$request->address,
            'password'=>bcrypt($request->password),
       ]);
      toastr()->success("The wallet has been linked effectively");
       return redirect("/home");
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
