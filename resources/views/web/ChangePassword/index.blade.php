@extends('web.layout') @section('main')

<div class="deposit-header">
    <h5>تغير كلمة المرور لتسجيل الدخول</h5>
    <div class="deposit-back">

          <a onclick="javascript:history.go(-1)">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
        </svg>
        </a>
    </div>
</div>
<div class="container change-passwordPage" pagename="Deposit">
    
    
                @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                   @endif
    <form class="row" action="{{ url('change-password') }}" method="POST">
         @csrf
        <div class="form-group col-md-12">
            <label class="fw-bold fs-6 my-2">كلمة المرور الأصلية لتسجيل الدخول</label>
            <div class="input-group">
                <input type="password" class="form-control" required name="current_password"  minlength="8" />
                <div class="input-group-append toggle-password">
                    <span class="input-group-text mdi mdi-eye-outline">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>
        </div>
        
             <div class="form-group col-md-12">
            <label class="fw-bold fs-6 my-2">كلمة كلمة المرور الجديدة لتسجيل الدخول : </label>
            <div class="input-group">
                <input type="password" class="form-control" required name="password" minlength="8" />
                <div class="input-group-append toggle-password">
                    <span class="input-group-text mdi mdi-eye-outline">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>
        </div>
        
             <div class="form-group col-md-12">
            <label class="fw-bold fs-6 my-2">تأكيد كلمة المرور الجديدة لتسجيل الدخول : </label>
            <div class="input-group">
                <input type="password" class="form-control" required name="password_confirmation"  minlength="8" />
                <div class="input-group-append toggle-password">
                    <span class="input-group-text mdi mdi-eye-outline">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>
        </div>
         <button type="submit" class="Step p-1 text-white d-fl text-center d-block mt-3 change-btn"> change</button>
    </form>
</div>
@endsection
