@extends('admin.layout')
@section('notification')
active
@endsection
@section('main')
<style type="text/css">
    	body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="page-content container">

<div class="container px-0">
<div class="row mt-4">
<div class="col-12 col-lg-12">
<div class="row">
<div class="col-12">
<div class="text-center text-150">
<i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
<span class="text-default-d3"></span>
</div>
</div>
</div>

<hr class="row brc-default-l1 mx-n1 mb-4" />
<div class="row">
<div class="col-sm-6">
<div>
<span class="text-sm text-grey-m2 align-middle">الاسم :</span>
<span class="text-600 text-110 text-blue align-middle"> {{$userData->name}}</span>
</div>                         
<div class="text-grey-m2">
<div class="my-1">
كمية النقود التي يمتلكها
</div>
<div class="my-1">
{{$userData->score}} $
</div>
<div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{$userData->phone}}</b></div>
</div>
</div>

<div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
<hr class="d-sm-none" />
<div class="text-grey-m2">

<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">الكود :</span>{{$userData->code_invention}}</div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">التاريح:</span> {{$userData->created_at}}</div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">الايميل:</span> <span class="">{{$userData->email}}</span></div>
</div>
</div>

</div>
<!-- start withDraw-->
<div class="mt-4">
<div class="row text-600 text-white bgc-default-tp1 py-25">
<div class="d-none d-sm-block col-2">#</div>
<div class="col-9 col-sm-2">المستخدم</div>
<div class="d-none d-sm-block col-4 col-sm-2">الموظف</div>
<div class="d-none d-sm-block col-sm-2">كمية الايداع</div>
<div class="d-none d-sm-block col-sm-2">الحالة</div>
<div class="d-none d-sm-block col-sm-2">التاريخ</div>
</div>
@forelse ($Deposits as $val )


<div class="text-95 text-secondary-d3">
<div class="row mb-2 mb-sm-0 py-25">
<div class="d-none d-sm-block col-2">{{$loop->iteration}}</div>
<div class="col-9 col-sm-2">{{$val->user->name}}</div>


    <div class="d-none d-sm-block col-2">
    @if($val->Notification->admin_id != null)
    {{$val->Notification->admin->name}}
    @else
     بدون موظف
    @endif

</div>
<div class="d-none d-sm-block col-2">{{$val->deposit_money}} $</div>
<div class="d-none d-sm-block col-2 text-95">
    @if($val->status == 1)
  .....
    @else
    ...
    @endif
</div>
<div class="d-none d-sm-block col-2 text-95">{{$val->created_at}}</div>

</div>
@empty
<h1>no data</h1>
@endforelse






</div>
<!--end  withDraw-->
<!--start deposit-->
<div class="mt-4">
<div class="row text-600 text-white bgc-default-tp1 py-25">
<div class="d-none d-sm-block col-2">#</div>
<div class="col-9 col-sm-2">المستخدم</div>
<div class="d-none d-sm-block col-2 col-sm-2">الموظف</div>
<div class="d-none d-sm-block col-sm-2">كمية السحب</div>
<div class="d-none d-sm-block col-sm-2">الحالة</div>
<div class="d-none d-sm-block col-sm-2">التاريخ</div>
</div>
@forelse ($Withdraws as $val )


<div class="text-95 text-secondary-d3">
<div class="row mb-2 mb-sm-0 py-25">
<div class="d-none d-sm-block col-2">{{$loop->iteration}}</div>
<div class="col-9 col-sm-2">{{$val->user->name}}</div>
<div class="d-none d-sm-block col-2">
    @if($val->Notification->admin_id != null)
    {{$val->Notification->admin->name}}
    @else
     بدون موظف
    @endif
</div>

<div class="d-none d-sm-block col-2">{{$val->withdraw_money}} $</div>

<div class="d-none d-sm-block col-2 text-95">
    @if($val->status == 1)
  .....
    @else
    ...
    @endif
</div>
<div class="d-none d-sm-block col-2 text-95">{{$val->created_at}}</div>
</div>
@empty
<h1>no data</h1>
@endforelse





<hr/>
</div>
<!-- end Deposit-->
<!--start Transfer-->
<div class="mt-4">
<div class="row text-600 text-white bgc-default-tp1 py-25">
<div class="d-none d-sm-block col-2">#</div>
<div class="col-9 col-sm-2">الراسل</div>
<div class="d-none d-sm-block col-4 col-sm-2">المرسل اليه</div>
<div class="d-none d-sm-block col-sm-2">الفلوس المرسلة</div>
<div class="d-none d-sm-block col-sm-2">الفلوس المستلمة بعد الخصم</div>
<div class="d-none d-sm-block col-sm-2">التاريخ</div>
</div>
@forelse ($TransferMony as $val )


<div class="text-95 text-secondary-d3">
<div class="row mb-2 mb-sm-0 py-25">
<div class="d-none d-sm-block col-2">{{$loop->iteration}}</div>
<div class="col-9 col-sm-2">{{$val->usersend->name}}</div>
<div class="d-none d-sm-block col-2">{{$val->resiveUser->name}}</div>
<div class="d-none d-sm-block col-2">{{$val->mony_resive}}</div>
<div class="d-none d-sm-block col-2">{{$val->mony_after_discount}}</div>

<div class="d-none d-sm-block col-2 text-95">{{$val->created_at}}</div>

</div>
@empty
<h1>no data</h1>
@endforelse






</div>
<!-- withDraw-->
</div>
</div>
</div>
</div>
@endsection
