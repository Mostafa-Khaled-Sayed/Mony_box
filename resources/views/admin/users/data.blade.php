
@extends('admin.layout')
@section('active4')
active
@endsection
@section('main')
<!--Start Search-->

  <div class="main-content">
    <div class="container">
      <div class="table-responsive">
      <table class="display nowrap " id="tableDashboard" data-page-length='50'>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الخدمة</th>
            <th scope="col">البطاقة</th>
            <th scope="col">رقم التنفيذ</th>
            <th scope="col">رقم التليفون</th>
            <th scope="col">الشريحة الجهاز</th>
            <th scope="col">تاريخ التقديم</th>
            <th scope="col">المراجعة</th>
            <th scope="col">الجاهزية</th>
            <th scope="col">اسم العميل</th>
            <th scope="col">سعر العملية</th>
            <th scope="col">السعر الفعلى</th>
            <th scope="col">المبلغ الاضافى</th>
            <th scope="col">التكلفة</th>
            <th scope="col">العملة </th>
            <th scope="col">رقم العميل</th>
            <th scope="col">المزيد</th>
          </tr>
        </thead>
        <tbody>

            @foreach($wait as $index=>$value)
          <tr>
            <th scope="row">{{$index+1}}</th>
            <td>{{$value->status?"ارسال الاموال ":"استلام الاموال"}}</td>
            <td>123456</td>
            <td></td>
            <td>1234568256</td>
            <td>98547</td>
            <td>{{$value->created_at}}</td>
            <td>مقيد</td>
            <td>{{$value->status_mony=='2'?"قيد الانتظار":"غير جاهز"}}</td>
            <td>{{$value->user->name}}</td>
            <td>968</td>
            <td>696</td>
            <td>0</td>
            <td>
              <a href="#">ضبط</a>
            </td>
            <td>ريال</td>
            <td>826</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                 المزيد
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">ربط التجهيز</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#view">مشاهدة</a>
                  <a class="dropdown-item" href="#">جاهزة</a>
                  <a class="dropdown-item" href="#">الغاء العملية</a>
                </div>
              </div>
            </td>
          </tr>
    @endforeach
        </tbody>
      </table>
    </div>
    <div class="modal slide-bottom" id="view" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog assets-card container"> 
      <div class="d-flex align-items-center justify-content-between pb-2">
        <div class="close" data-dismiss="modal" aria-label="Close">
          <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
            height="20">
            <path
              d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
              fill="currentColor"></path>
          </svg>
        </div>
      </div>


      <div class="modal-content  ">
        <div class="select-country">
           <a href="#" class="btn print-btn">طبعاة مستند</a>
          <div class="viewMore">
              <ul class="list-unstyled">
                <li class="d-flex">
                  <span>id</span>
                  <span>87222</span>
                </li>
                <li class="d-flex">
                  <span>الخدمة</span>
                  <span>العاب</span>
                </li>
                <li class="d-flex">
                  <span>الجهاز</span>
                  <span>الهاتف</span>
                </li>
                <li class="d-flex">
                  <span>البطاقة</span>
                  <span>123456</span>
                </li>
                <li class="d-flex">
                  <span>رقم التنفيذ</span>
                  <span>875299</span>
                </li>
                <li class="d-flex">
                  <span>رقم التليفون</span>
                  <span>78526</span>
                </li>
                <li class="d-flex">
                  <span>شريحة الهاتف</span>
                  <span>1576226</span>
                </li>
                <li class="d-flex">
                  <span>تاريخ التقديم</span>
                  <span>12-12-2023</span>
                </li>
                <li class="d-flex">
                  <span>المراجعة</span>
                  <span>مقيد</span>
                </li>
                <li class="d-flex">
                  <span>الجاهزية</span>
                  <span>غير جاهز</span>
                </li>
                <li class="d-flex">
                  <span>العميل</span>
                  <span>أصيل الصالحى</span>
                </li>
                <li class="d-flex">
                  <span>السعر الفعلى</span>
                  <span>986</span>
                </li>
                <li class="d-flex">
                  <span>سعر العملية</span>
                  <span>986</span>
                </li>
                <li class="d-flex">
                  <span>المبلغ الأضافى</span>
                  <span>0</span>
                </li>
                <li class="d-flex">
                  <span>التكلفة </span>
                  <span>986</span>
                </li>
                <li class="d-flex">
                  <span>التكلفة </span>
                  <span>986</span>
                </li>
                <li class="d-flex">
                  <span>العملة</span>
                  <span>الريال</span>
                </li>
                <li class="d-flex">
                  <span>رقم العميل</span>
                  <span>7852</span>
                </li>
              </ul>
          </div>
        
        </div>
      </div>
    </div>
  </div>

    </div>
  </div>

@endsection



























