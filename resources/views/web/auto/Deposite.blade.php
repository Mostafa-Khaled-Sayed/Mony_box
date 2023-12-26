@extends('../web.layout')

@section('main')
          <div class="deposit-header">
           <h5>Deposit</h5> 
           <div class="deposit-back">
                 <a onclick="javascript:history.go(-1)">
               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
                </a>
           </div>
        </div>
    <div class='container deposit-page' pagename='Deposit'>

        <div class='row'>
            <div class="col-md-12">
                <div class="  ">
                    <label class='fw-bold fs-4 deposit-label'>Deposit Method</label>
                    <select class="mt-4 deposit-select" name="" id="">
                        <option value="1" class="w-25">Virtual currency deposit</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="">
                    <label class='fw-bold fs-4 deposit-label'>Currency</label>
                    <select class="mt-4 deposit-select" name="" id="">
                        <option value="1">USD</option>
                    </select>
                    <h6 class='opacity-50 text-start'>Conversion Rate 1 : 1</h6>
                </div>
            </div>
        </div>

       <h5 class='fw-bold fs-6 deposit-label mt-3'>Deposit Channel</h5>
        <div class='row row1'>
            <div class="col-lg-12">
                <div class="">
                    <select class="mt-2 deposit-select" name="" id="">
                        <option value="1">USD-TRC20 <br> Promotion 8%</option>
                    </select>
                </div>
            </div>
            <div class=" col-lg-12">
                <h5 class='fw-bold text-danger mt-2'>amount limit 5 - 500000</h5>
            </div>

            <a type="button" class='Step mb-5 w-50 p-1 mt-5 text-white d-flex align-items-center justify-content-center'
                data-toggle="modal" data-target="#pay">Next Step</a>
        </div>
        <!-- Modal -->
        <!-- Modal -->
        <div class="modal mt-5 fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="payLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content  bg-light">
                    <div class="modal-header     justify-content-center">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Deposit</h5>

                    </div>
                    <div class="modal-body">
                        <form action="{{route('pay')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">The amount of goods</label>
                                <input class="form-control" type="text" name="" placeholder="{{ $data->price }}" value="{{ $data->price }}"  readonly>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deposit amount (USD-TRc20)</label>
                                <input class="form-control" type="text" placeholder="{{ $data->price }}" readonly>
                                <small id="emailHelp" class="form-text text-muted">{{ $data->price }} Deposit amount
                                    (USD-TRc20) = {{ $data->price }}
                                    (Conversion rate 1:1)</small>
                            </div>

                            Tips
                            <br>

                            -Failure to follow the above information operation will cause pre-order failure
                            <br>
                              <div class="col-lg-12 d-flex align-items-center justify-content-center">
                            <input type="submit" class="Step  w-50 p-1 mt-5 text-white d-flex align-items-center justify-content-center" value="GoPay"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--end Modal-->
    </div>
@endsection
