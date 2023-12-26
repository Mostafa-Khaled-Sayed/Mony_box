<?php

namespace App\Http\Controllers\mony;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function getWithDraw(){
      return view('web.WithDraw.index');  
        
    }
}
