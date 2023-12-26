<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\WithdrawOrDepositMoney;
use Illuminate\Http\Request;

class DatamoneyController extends Controller
{
    //
    public function index(){
  $data = WithdrawOrDepositMoney::all();
   return view('admin.allDataMony.index', compact('data'));

    }
}
