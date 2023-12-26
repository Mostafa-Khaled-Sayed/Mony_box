@extends('web.layout')

@section('main')

  <div class="home-header py-3">
    <div class="container">
      <div class="ad-header d-flex">
        <a class="back-page  font-bold ml-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-arrow-right"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
          </svg>
        </a>
        <div class="text-white font-bold">
          <strong>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
              class="bi bi-currency-dollar" viewBox="0 0 16 16">
              <path
                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
            </svg><span class="mr-1">ارسال النقود</span></strong>
        </div>
      </div>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <div class="web-home-content assets-card py-5 m-0">
        <div class="d-flex custom-steps">
          <div class="bar"></div>
          <div class="d-flex step-item">
            <div class=" step-no" style="background-color: var(--main-color);color: #fff;">1</div>
            <div class="text">اختر طريقة</div>
          </div>
          <div class="d-flex">
            <div class=" step-no" style="background-color: var(--main-color);color: #fff;">2</div>
            <div class="text">إضافة حساب</div>
          </div>
          <div class="d-flex">
            <div class=" step-no" style="background-color: var(--main-color);color: #fff;"> 3</div>
            <div class="text">إرسال النقود</div>
          </div>
        </div>

        <div class="sendcash-content">
          <div class="text-center">تفاصيل السحب          </div>
         <form >
          <div class="transfer-card mt-4">
              <label>مبلغ التحويل</label>
              <input type="text" value="0" class="input-group">
          </div>
          <div class="transfer-card mt-4">
            <label>مبلغ المتوقع استلامه</label>
            <input type="text" value="0" class="input-group">
        </div>
           <a class="btn follow-btn mt-5" href="">الحصول على عرض السعر</a>
          </form>
          </div>
        </div>
      </div>
    </div>

    <!--add new account form-->
    <div class="modal slide-bottom" id="newAccount" tabindex="-1" aria-labelledby="staticBackdropLabel"
      aria-hidden="true">
      <div class="modal-dialog assets-card container"> <div class="d-flex align-items-center justify-content-between pb-2">
          <strong>تعيين طريقة الدفع الخاصة بي</strong>
          <div class="close" data-dismiss="modal" aria-label="Close">
            <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
              height="20">
              <path
                d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                fill="currentColor"></path>
            </svg>
          </div>
        </div>
        <div class="modal-content">
          <form class="sendcash-content choose-form">
            <h6 class="font-bold mb-3">Vodafone Cash</h6>
            <label>الأسم كامل ( أختيارى ) </label>
            <input type="text" class="input-group" >
            <label> رقم فودافون كاش</label>
            <input type="text" class="input-group" >
            <div class="group-btn mt-3">
              <a  class="btn back-color" data-toggle="modal" data-target="#confirmation" data-dismiss="modal"  aria-label="Close"> تأكيد</a>
              <a href="#" class="btn"> الغاء</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--confirmation form-->
    <div class="modal slide-bottom" id="confirmation" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog assets-card container"> <div class="d-flex align-items-center justify-content-between pb-2">
        <strong>التحقق الأمني </strong>
        <div class="close" data-dismiss="modal" aria-label="Close">
          <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
            height="20">
            <path
              d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
              fill="currentColor"></path>
          </svg>
        </div>
      </div>
      <div class="modal-content">
        <form class="sendcash-content choose-form">
          <h6 class="font-bold mb-3">لتأمين حسابك، يُرجى إتمام التحقُّق التالي.</h6>
          <label>رمز التحقق من الهاتف</label>
          <input type="text" class="input-group" >
          <a class="input-group">احصل على الرمز</a>
           <span class="note">أدخل الرمز المكوّن من 6 أرقام المرسل إلى 011****3609
          </span>
          <a class="main-color mt-3 note" href="">التحقق الأمني غير متوفر؟</a>
            <a href="#" class="input-group text-center d-block mt-4 back-color w-100"> ارسال</a>
        </form>
      </div>
    </div>
  </div>

@endsection
