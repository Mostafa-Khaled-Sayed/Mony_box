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
         <span class="mr-1">التاريخ</span></strong>
        </div>
      </div>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <div class="web-home-content assets-card py-5 m-0">
        <div class="date-page">
          <div class="data-header">
            <h6 class="mb-3">يتم توفير البيانات من قبل المسئول</h6>
            <div class="mb-3 total-assets">
              <strong class="mb-0 d-block">مجموع أصولى</strong>
              <span>0</span>
            </div>
          </div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#canceled" type="button" role="tab" aria-selected="true">ملغيه </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#complete" type="button" role="tab" aria-selected="false">جاهزه </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#pending" type="button" role="tab" aria-selected="false">قيد الأنتظار</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#all" type="button" role="tab" aria-selected="false">الجميع</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="canceled" role="tabpanel" >
                <div class="table-responsive">
                <table class="table table-dark data-table">
                  <thead>
                    <tr>
                      <th scope="col">الخدمة</th>
                      <th scope="col">رقم الخدمة</th>
                      <th scope="col">المبلغ</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col">رقم العملية</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($dontready as $value)
                    <tr>
                      <td scope="row">{{$value->status?"ايداع":"سحب"}} </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->status?$value->deposit_money:$value->withdraw_money}}</td>
                      <td>{{$value->created_at}}</td>
<td>{{$value->status?$user->code_invention:App\Models\Wallate::where('user_id',auth()->user()->id)->first()->address}}</td>
                    </tr>
                 
                    @endforeach
                  </tbody>
                </table>
           </div>
                <!--if No datat-->
                @if(isset($dontready))
                <div class="empty text-center"> 
                  لا يوجد تاريخ متاح
                 </div>
                 @endif
                 
            </div>
            <div class="tab-pane fade" id="complete" role="tabpanel" >
                 <div class="table-responsive">
                <table class="table table-dark data-table">
                  <thead>
                    <tr>
                      <th scope="col">الخدمة</th>
                      <th scope="col">رقم الخدمة</th>
                      <th scope="col">المبلغ</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col">رقم العملية</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($wait as $value)
                    <tr>
                      <td scope="row">{{$value->status?"ايداع":"سحب"}} </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->status?$value->deposit_money:$value->withdraw_money}}</td>
                      <td>{{$value->created_at}}</td>
<td>{{$value->status?$user->code_invention:App\Models\Wallate::where('user_id',auth()->user()->id)->first()->address}}</td>
                    </tr>

                    @endforeach
                                        <tr>
                        <td colspan=5> المبالغ التي تم ارساله من خلالك الي اشخاص اخري</td>
                    </tr>
                                          @foreach($user->monysend as $value)
                    <tr>
                      <td scope="row">المبلغ المرسل </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->mony_send}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->resive_user_id}}</td>
                    </tr>

                    @endforeach
                                        <tr>
                                            
                            <td colspan=5 >المبالغ التي تم ارساله اليك من اشخاص اخري </td>
                    </tr>
                      @foreach($user->resiveMony as $value)
                    <tr>
                      <td scope="row">مبلغ الاستقبال </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->mony_after_discount}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->resive_user_id}}</td>
                    </tr>

                    @endforeach
                       <tr>
                        <td colspan=5> المبالغ الذي فزته به من مشاهده الاعلانات</td>
                    </tr>
                      @foreach($readyprofite as $value)
                    <tr>
                      <td scope="row">ما فزت به من الاعلانات </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->profits}}</td>
                      <td colspan=2>{{$value->created_at}}</td>
                    </tr>

                    @endforeach
                     <tr>
                     <td scope="row">تعبئة رصيد</td>
                      <td>12345678</td>
                       <td>100</td>
                      <td>12-12 08:29</td>
                      <td>1234562</td>
                    </tr>
                  </tbody>
                </table>
           </div>
                <!--if No datat-->
                @if(isset($wait))
                <div class="empty text-center"> 
                  لا يوجد تاريخ متاح
                 </div>
                 @endif
            </div>
            <div class="tab-pane fade" id="pending" role="tabpanel" >
                    <div class="table-responsive">
                <table class="table table-dark data-table">
                  <thead>
                    <tr>
                      <th scope="col">الخدمة</th>
                      <th scope="col">رقم الخدمة</th>
                      <th scope="col">المبلغ</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col">رقم العملية</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($ready as $value)
                    <tr>
                      <td scope="row">{{$value->status?"ايداع":"سحب"}} </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->status?$value->deposit_money:$value->withdraw_money}}</td>
                      <td>{{$value->created_at}}</td>
<td>{{$value->status?$user->code_invention:App\Models\Wallate::where('user_id',auth()->user()->id)->first()->address}}</td>
                    </tr>

                    @endforeach
                  
                  </tbody>
                </table>
           </div>
                <!--if No datat-->
                                 @if(isset($ready))
                <div class="empty text-center"> 
                  لا يوجد تاريخ متاح
                 </div>
                 @endif
            </div>
            <div class="tab-pane fade" id="all" role="tabpanel" >
       <div class="table-responsive">
                <table class="table table-dark data-table">
                  <thead>
                    <tr>
                      <th scope="col">الخدمة</th>
                      <th scope="col">رقم الخدمة</th>
                      <th scope="col">المبلغ</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col">رقم العملية</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($user->withdrawOrDdepositMony as $value)
                    <tr>
                      <td scope="row">{{$value->status?"ايداع":"سحب"}} </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->status?$value->deposit_money:$value->withdraw_money}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->status?$user->code_invention:App\Models\Wallate::where('user_id',auth()->user()->id)->first()->address}}</td>
                    </tr>

                    @endforeach
                    <tr>
                        <td colspan=5> المبالغ التي تم ارساله من خلالك الي اشخاص اخري</td>
                    </tr>
                      @foreach($user->monysend as $value)
                    <tr>
                      <td scope="row">المبلغ المرسل </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->mony_send}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->resive_user_id}}</td>
                    </tr>

                    @endforeach
                                        <tr>
                                            
                            <td colspan=5 >المبالغ التي تم ارساله اليك من اشخاص اخري </td>
                    </tr>
                      @foreach($user->resiveMony as $value)
                    <tr>
                      <td scope="row">مبلغ الاستقبال </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->mony_after_discount}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->resive_user_id}}</td>
                    </tr>

                    @endforeach
                       <tr>
                        <td colspan=5> المبالغ الذي فزته به من مشاهده الاعلانات</td>
                    </tr>
                      @foreach($readyprofite as $value)
                    <tr>
                      <td scope="row">ما فزت به من الاعلانات </td>
                    <td>{{$value->id}}</td>
                       <td>{{$value->profits}}</td>
                      <td colspan=2>{{$value->created_at}}</td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>
           </div>
                <!--if No datat-->
                @if(isset($user))
                <div class="empty text-center"> 
                  لا يوجد تاريخ متاح
                 </div>
                 @endif
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>

    <!--add new account form-->
    <div class="modal slide-bottom" id="newAccoun" tabindex="-1" aria-labelledby="staticBackdropLabel"
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


  <!--yaman send-->
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
        <label>المبلغ</label>
        <input type="text" class="input-group" >
        <label>أسم المستلم </label>
        <input type="text" class="input-group" >
        <label> رقم المستلم  </label>
        <input type="text" class="input-group" >
        <label> ملاحظه</label>
        <input type="text" class="input-group" >
        <div class="group-btn mt-3">
          <a  class="btn back-color w-100" data-toggle="modal" data-target="#confirmation" data-dismiss="modal"  aria-label="Close"> ارسال</a>
        </div>
      </form>
    </div>
  </div>
</div>

         
@endsection
