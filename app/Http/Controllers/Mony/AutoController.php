<?php

namespace App\Http\Controllers\Mony;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;
use App\Trait\Reward;
use App\Models\Profit;
use App\Models\racharch\Rchagesuser;
use App\Models\WithdrawOrDepositMoney;
class AutoController extends Controller
{
    use Reward;

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = Data::findOrFail($id);

        return view('web.auto.Deposite',compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datarechachWait=Rchagesuser::with('user', 'package.compantincom.Company', 'packagePrice.compantincom.Company')->whereIn('status', ['غير جاهزه', 'قيد الانتظار'])->get();
        // return  $datarechachWait;
       $wait=WithdrawOrDepositMoney::with('user')->whereIn('status_mony',['0', '1'])->get();
        // return $wait;
        // $data['wait']=$wait;
        // return $data["wait"];
       return  view('admin.users.data',compact('wait','datarechachWait'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Data::findOrFail($id);
        return view('web.auto.order',compact('data'));
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
