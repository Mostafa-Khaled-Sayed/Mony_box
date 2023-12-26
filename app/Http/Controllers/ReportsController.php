<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\TransferMony;
use App\Models\User;
use App\Models\WithdrawOrDepositMoney;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TransferMony = TransferMony::with('usersend', 'notification', 'resiveUser')->paginate(10);
      

        return view('admin.report.convert', compact('TransferMony'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = WithdrawOrDepositMoney::with('user', 'Notification')->where('status', 1)->get();
      
        return view('admin.report.send', compact('data'));
    }
    public function recive()
    {
        $data = WithdrawOrDepositMoney::with('user', 'Notification')->where('status', 0)->get();
        return view('admin.report.recive', compact('data'));
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
    public function show($id)
    {
       Notification::where("user_id", $id)->update(['read' => 1]);
        $Deposits = WithdrawOrDepositMoney::with('user', 'Notification')->where('status', 1)->where('user_id',$id)->get();
        $Withdraws = WithdrawOrDepositMoney::with('user', 'Notification')->where('status', 0)->where('user_id', $id)->get();
        $TransferMony = TransferMony::with('usersend', 'notification', 'resiveUser')->where('user_id', $id)->get();
        $userData = User::with('scores', 'notification.TransferMony', 'notification.SendOrrecive')->findOrFail($id);
         
        return view("admin.report.reportForOnUser_id", compact('userData' , 'Deposits' , 'Withdraws' , 'TransferMony'));
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
