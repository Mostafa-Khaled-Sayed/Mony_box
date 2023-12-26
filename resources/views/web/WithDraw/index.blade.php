@extends('web.layout')

@section('main')
 <div class="deposit-header">
           <h5>withdraw</h5> 
           <div class="deposit-back">
                 <a onclick="javascript:history.go(-1)">
               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
                </a>
           </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class='container  deposit-page' pagename='Deposit'>
        <div class='row'>
            <div class=" col-md-12">
                <div class="">
                    <label class='fw-bold fs-6 deposit-label'>Withdrawal Method</label>
                    <select class="mt-4 deposit-select" name="" id="">
                        <option value="1" class="w-25">Virtual currency withdrawal</option>
                    </select>
                </div>
            </div>
            <div class=" col-md-12">
                <div class=" ">
                    <label class='fw-bold fs-6 mt-3 deposit-label'>Currency</label>
                    <select class="mt-4 deposit-select" name="" id="">
                        <option value="1">USDT</option>
                    </select>
                    <h6 class='opacity-50 text-start mt-3'>Conversion Rate 1 : 10</h6>
                </div>
            </div>

        </div>
          <div class=" col-md-12 mb-3">
                <div class="">
                    <label class='fw-bold fs-6 deposit-label' for="withdrawal_amount">Withdrawal amount</label>
                   <input type="text" name="withdrawal_amount"  id="withdrawal_amount" class="input-group">
                </div>
            </div>
               <div class=" col-md-12 mb-3">
                <div class="">
                    <label for="commission" class='fw-bold fs-6 deposit-label'>Commission</label>
                   <input type="text" name="commission" id="commission" readonly value="{{App\Models\Tax::get()[2]->tax}}%"  class="input-group">
                </div>
            </div>
            
        <div class='row row1'>
            <div class=" col-md-12">
                <div class="mt-2">
                    <select class="deposit-select" name="" id="">
                        <option value="1">USDT-TRC20 <br> Promotion 8%</option>
                    </select>
                </div>
            </div>
            <div class=" col-md-12">
                <h5 class='text-danger mt-2'>amount limit {{App\Models\Tax::get()[2]->tax}} - 500000</h5>
            </div>
            <div class="Box col-md-12 ">
                <a type="button" class='Step p-1 text-white d-fl text-center d-block mt-3'
                data-toggle="modal" data-target="#pay">Next Step</a>
            </div>
        </div>
        <!-- Modal -->
        <!-- Modal -->
        <div class="modal mt-5 fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="payLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content  bg-light">
                    <div class="modal-header     justify-content-center">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Withdrawal</h5>

                    </div>
                    <div class="modal-body">
                        <form action="{{route('withdrow')}}" method="POST">
@csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Withdrawal amount (USDT-TRc20)</label>
                                <input class="form-control" id="newValue" name="price" readonly type="text" placeholder="XXXXX" >
                                <small id="emailHelp" class="form-text text-muted"><span  id="reapteValue1">XXXXX</span> Withdrawal amount
                                    (USDT-TRc20) = <span id="reapteValue">XXXXX</span>
                                    (Conversion rate 1:10)</small>
                                    </br>
                               <label>Payment password</label>
                                <input type="password" name="password" class="input-group">
                            </div>

                            Tips
                            <br>

                            -Failure to follow the above information operation will cause pre-order failure
<br/>
<div class="text-center col-12">
                    <input type="submit" class="Step btn  GoPay text-center"  id="Pay" value="Go to withdrawal"/>
                    </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--end Modal-->
    </div>

      <script>
                 console.log("e")
    document.querySelector('#withdrawal_amount').addEventListener("input", (event) => {


            if({{auth()->user()->scores->score}} >{{auth()->user()->scores->freezing_money}} +{{App\Models\Tax::get()[2]->tax}}) 
            if(event.target.value<{{App\Models\Tax::get()[2]->tax}}){  console.log("e")
                 //اذا دخل رقم اقل من هذا سوف يظر الرساله من المهندسه سندس
           //code eng sand0s
          $(this).insertAfter('<div id="space">الحد الأدنى 10 دولار</div>');
           //لو دخل قيمه اقل من الحد الادني
            }else if(event.target.value>{{auth()->user()->scores->score}}){
                   //اذا دخل رقم اقل من هذا سوف يظر الرساله من المهندسه سندس
           //code eng sand0s
           //هنا لو دخل قيمه اكبر من فلوسه اصلا 
           console.log("e/")
            }else{
                           console.log("true")
                //هنا الحاله الوحيده الصحيحه 
document.querySelector('#newValue').value=event.target.value-(event.target.value*{{App\Models\Tax::get()[2]->tax}}/100);
            }else{
                //هنا كود ليس لديك رصيد كافي لسحب 
                //هذه الرطساله ممكن تطلع قبل م يدخل اي فلوس لان كدا كدا حسابه مفيش فيه فلوس 
                // $('#withdrawal_amount').after('<div id="space">ليس لديك رصيد كافي</div>');
                console.log("e/e")
            }
            
            
    });
</script>
@endsection

