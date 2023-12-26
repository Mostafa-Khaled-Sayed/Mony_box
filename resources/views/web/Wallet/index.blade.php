
@extends('web.layout')

@section('main')
     <div class="deposit-header">
           <h5>Wallet</h5> 
           <div class="deposit-back">
                 <a onclick="javascript:history.go(-1)">
               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
                </a>
           </div>
        </div>
    <div class='container  deposit-page' pagename='Deposit'>
        
        <div class='row'>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{route('Walletstore')}}" method="post">
                @csrf
            <div class=" col-md-12">
                <div class="">
                    <label class='fw-bold fs-6 deposit-label'>نوع الشبكة الرئيسية</label>
                    <select class="mt-4 deposit-select" name="" id="">
                        <option value="1" class="w-25">(USDT-TRc20) </option>
                    </select>
                </div>
            </div>
            <div class=" col-md-12">
                <div class=" ">
                    <label class='fw-bold fs-6 mt-3 deposit-label'>العملة </label>
                    <select class="mt-4 deposit-select" name="" id="">
                        <option value="1">USDT</option>
                    </select>
                </div>
            </div>
            <div class=" col-md-12">
                <div >
                    <label class='fw-bold fs-6 mt-3 deposit-label'>عنوان المحفظة </label>
                    <input type="text" name="address" required class="mt-4 deposit-select">
                </div>
            </div>
            <div class=" col-md-12">
                <div >
                    <label class='fw-bold fs-6 mt-3 deposit-label'>ادخل رقم تلفون لهذا العنوان </label>
                    <input type="tel" name="phone" required class="mt-4 deposit-select">
                </div>
            </div>
                 <div class=" col-md-12">
                <div class=" ">
                    <label class='fw-bold fs-6 mt-3 deposit-label'> كلمة مرور السحب  </label>
                    <input type="password" required name="password" class="mt-4 deposit-select">
                </div>
            </div>
             <div class="Box col-md-12 ">
                <button type="submit" class='Step p-1 text-white d-fl text-center d-block mt-3'>موافق</button>
            </div>
</form>
        </div>
       

    </div>

@endsection
