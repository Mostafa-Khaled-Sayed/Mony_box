
@extends('web.layout')

@section('main')

    <div class="deposit-header">
           <h5>Profile</h5> 
           <div class="deposit-back">
                 <a onclick="javascript:history.go(-1)">
               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path  d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"></path>
             
                </svg>
                   </a>
           </div>
        </div>
        <div class='container profile-page'>
            <div class="assets-card mb-3">
                <p class="assets-avatar d-flex"><img src="https://www.monyboxs.com/IMG/mony.jpg" alt="" class="me-3">
                <span>{{ Auth::user()->name }}<br>
                اجمالى الأصول 10.00
                </span>
                </p>
                <ul class="list-unstyled">
                    <li class="d-flex border-bottom py-3  justify-content-between">
                        <span>Name</span>
                         <span> {{ Auth::user()->name }}</span>
                    </li>
                       <li class="d-flex border-bottom py-3 justify-content-between">
                        <span>Email</span>
                         <span>  {{ Auth::user()->email }}</span>
                    </li>
                       <li class="d-flex border-bottom py-3 justify-content-between">
                        <span>Phone</span>
                         <span> {{ Auth::user()->phone }}</span>
                    </li>
                       <li class="d-flex border-bottom py-3 justify-content-between">
                        <span>Code Invitation</span>
                         <span> {{ Auth::user()->code_invention }}</span>
                    </li>
                     </li>
                    <li class="d-flex border-bottom py-3 justify-content-between">
                        <span>Your Mony</span>
                         <span>   {{ Auth::user()->scores->score }}</span>
                    </li>
                    <li class="py-3 fw-bold">
                        <span class="text-danger">لا يمكن تغير المعلومات المذكورة أعلاه بمجرد ارسالها اذا كان لديك أى أسئلة  أخرى , يرجى الأتصال بخدمة العملاء</span>
                    </li>
                </ul>
            </div>
            
           <div class="assets-card">
                <ul class="list-unstyled">
                    <li><h4 class=" fw-bold">ضبط كلمة السر</h4></li>
                    <li class="d-flex border-bottom py-3  justify-content-between">
                        <a href="{{url('/change-password')}}" class=" fw-bold text-black" style="color:#000 !important;">تغير كلمة المرور لتسجيل الدخول</a>
                         <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#333" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg></span>
                    </li>
                     <li class="d-flex  py-3  justify-content-between">
                        <a href="" class=" fw-bold text-black" style="color:#000 !important;"   data-toggle="modal" data-target="#changePassword" >تغير كلمة مرور السحب</a>
                         <span class="icon d-flex"> <h5 class="mr-3 fw-bold" style="color: #888;">غير مضبوط</h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#333" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg></span>
                    </li>
                </ul>
            </div>
            
            <div class="assets-card">
                  <div class="clear-cache  fw-bol d-flex justify-content-between"><input type="submit" class="btn" value="Clear cache">  <i class="fa-solid fa-trash-can"></i></div>
            </div>
        </div>
  <div class="modal mt-5 fade " id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content  bg-light">
                    <div class="modal-header     justify-content-center">
                        <h5 class="modal-title text-center fw-bold" id="exampleModalLongTitle">الوظيفة غير متوفرة</h5>

                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">

                            <div class="form-group">
                                <label for="" class="fw-bold">يتم تعين كلمة مرور السحب عند ربط المحفظة . ليس لديك محفظة مرتبطه</label>
                              <a type="button" class="Step p-1 text-white d-fl text-center d-block mt-3" >رابط الأن</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
   
  <div class='container'>
   @include('web.Icone.icone')
   
  <a href="{{ route('logout') }}" class="btn logout-btn btn-outline-primary w-50">  logout</a>
   
   </div>
</div>
@endsection
