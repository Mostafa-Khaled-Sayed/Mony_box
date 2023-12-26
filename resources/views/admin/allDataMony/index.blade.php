@extends('admin.layout')
@section('allDataMony')
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

<div class="container px-0">
<div class="row mt-4">




<!-- start withDraw-->
<div class="mt-4">
<div class="row text-600 text-white bgc-default-tp1 py-25">
<div class="d-none d-sm-block col-1">#</div>
<div class="col-1 col-sm-1">المستخدم</div>
<div class="d-none d-sm-block col-1 col-sm-1">المحفظة</div>
<div class="d-none d-sm-block col-2 col-sm-2">الموظف</div>
<div class="d-none d-sm-block col-sm-1">نوع البيان</div>
<div class="d-none d-sm-block col-sm-1">النقود</div>
<div class="d-none d-sm-block col-sm-1">الحالة</div>
<div class="d-none d-sm-block col-sm-2">التاريخ</div>
<div class="d-none d-sm-block col-sm-1">العمليات</div>

</div>
@forelse ($data as $val )


<div class="text-95 text-secondary-d3">
<div class="row mb-2 mb-sm-0 py-25">
<div class="d-none d-sm-block col-1">{{$loop->iteration}}</div>
<div class=" col-sm-1">{{$val->user->name}}</div>
<div class=" col-sm-1">..</div>
   <div class="d-none d-sm-block col-2">
    @if($val->admin_id != null)
    {{$val->admin->name}}
    @else
     بدون موظف
    @endif

</div>
<div class=" col-sm-1 ">
    <p class="badge badge-sm bg-gradient-success">@if($val->status = 1)
    
   ايداع
    @else
      سحب
    @endif</p>
</div>

 
<div class="d-none d-sm-block col-1">
    @if($val->status = 1)
    {{$val->deposit_money}} $
     @else
{{$val->withdraw_money}} $

     @endif
</div>

<div class="d-none d-sm-block col-1 text-95">
 
         
      @if($val->stauts_mony == 'جاهزة' )
    <p class="badge badge-sm bg-gradient-success"> {{$val->stauts_mony}}</p>
    @elseif ($val->stauts_mony == 'غير جاهزة')
       <p class="badge badge-sm bg-gradient-info"> {{$val->stauts_mony}}</p>
     @elseif($val->stauts_mony == 'ملغية')
        <p class="badge badge-sm bg-gradient-danger"> {{$val->stauts_mony}}</p>
         @elseif($val->stauts_mony == 'قيد الانتظار')
        <p class="badge badge-sm bg-gradient-warning"> 
            {{$val->stauts_mony}}</p>
     @endif
 
</div>
<div class="d-none d-sm-block col-2 text-95">{{$val->created_at}}</div>
<div class="d-none d-sm-block col-1 text-95">
     <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           المزيد
                        </button>
       <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
     @if( ($val->stauts_mony  != 'جاهزة' && $val->stauts_mony  == 'قيد الانتظار' ) || $val->stauts_mony == 'غير جاهزة')
                             <a href="{{url('/ready' ,$val->id)}}" class="text-center badge badge-sm bg-gradient-danger">جاهزة</a><br>
                             @endif  
                                   @if(  $val->stauts_mony   !=  'ملغية'  && $val->stauts_mony  == 'جاهزة')
                               <a data-toggle="modal" class="text-center badge badge-sm bg-gradient-danger" data-target="#cancel{{$val->id}}">ملغية</a><br>
                                @endif
                                @if( $val->stauts_mony == 'غير جاهزة')
                                <a href="{{url('/wait' ,$val->id)}}" class="text-center badge badge-sm bg-gradient-danger">قيد الانتظار</a> 
                                @endif
                            </div>
                         

                   <!--model-->
                            
</div>

        <!-- start Modal -->
                       <div class="modal fade" id="cancel{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من التغيير</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route("dashboard.cancel")}}" method="POST" autocomplete="off">
                             @csrf
                       
                                                
                              
                                <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$val->id }}">
                                 
                                   <div class="form-group col-md-6">
                                <label for="inputTitle">سبب الالغاء</label>
                                <input type="text" required  class="form-control"  name='message' id="inputTitle" >
                              </div>
                                  <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-danger">تغيير</button>
                                  </div>
                            </form>
                            </div>

                          </div>
                        </div>
                      </div>

                   <!--model-->


@empty
<h1>no data</h1>

</div>
</div>
@endforelse






</div>







</div>
<!-- end Deposit-->

</div>
</div>
</div>
@endsection
