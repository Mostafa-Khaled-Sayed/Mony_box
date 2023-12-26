<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    function index(){

        return view('web.invite');
        return view('qrcode');
    }
}
