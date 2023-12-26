@extends('web.layout')

@section('main')
<div class="">

    <div class='container '>
        <div class="assets-card">
            <p class="assets-avatar"><img src='{{ asset("IMG/mony.jpg") }}' alt='' class='me-4' />{{ Auth::user()->name }}</p>
    <hr>
     <div class="total-assets col-12">
        <h4 >My Total Assets</h4>
        <p>{{auth()->user()->scores->score}}</p> 
    </div>
     <input type="hidden" name="" value="{{$total=0}}
                            @foreach (\App\Models\Profit::where('user_id',auth()->user()->id)->get() as $value )
                                    {{$total+=$value->profits}}
                            @endforeach">
    <div class='row'>
        <div class="box col-4 ">
            <div class="">
                <h6 class="fw-bold">Today's profits</h6>
                <h6 class="fw-bold">{{$total}}</h6>
            </div>
        </div>
        <div class="box col-4 ">
            <div class="">
               <h6 class="fw-bold">Promotion bonus</h6>
                            <h6 class="fw-bold">{{ $Mony}}</h6>
            </div>
        </div>
        <div class="box col-4 ">
            <div class="">
                <h6 class="fw-bold">Accomulated Profits </h6>

 <h6 class="fw-bold">0</h6>

            </div>
        </div>
    </div>
        </div>
       
       
    </div>

                            <div class=" panel-primary tabs-style-1">
                                <div class=" tab-menu-heading m-auto w-100 mt-5 ">
                                    <div class="tabs-menu1  d-flex justify-content-center align-items-center ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line d-flex ">


                                          <li  class="nav-item w-90"> <a id="click1" href="#tab1" type="buttun" class="px-4  btn-lg btn btn-outline-info nav-link active" data-toggle="tab"> <label class="tab" for="radio-2">Auto</label> </a></li>
                                            <li class="nav-item w-90"><a href="#tab2" class="nav-link mx-1 btn-lg px-3  btn btn btn-outline-info px -5" data-toggle="tab">Normal</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">


                                        {{-- Strat Show Information Patient --}}

                                        <div class="tab-pane active" id="tab1">
                                          @include('web.auto.index')
                                        </div>

                                        {{-- End Show Information Patient --}}



                                        {{-- Start Invices Patient --}}

                                        <div class="tab-pane" id="tab2">

                                            <div class='container text-center mt-5'>
                                           

        <div class='row  '>

            @foreach ($datas as $data)
                @if (Auth::user()->scores->score < $data->final_price)
                    @if (Auth::user()->scores->score >= $data->starting_price)
                        <div class="Box col-md-6 col-lg-4">

                            <div class="IMG9 text-start">

                                <a href="{{ url('/step1') }}">
                                    <p class="fw-bold">Required Amount: {{ $data->starting_price }} ~
                                        {{ $data->final_price }} </p>
                                    <p class="fw-bold">Income: {{ $data->starting_income }} ~ {{ $data->final_income }}</p>
                                </a>

                            </div>
                        </div>

                        @else
                        <div class="Box col-md-6 col-lg-4 mt-4">

                            <div class="IMG9 text-start dataClose">

                                <p>
                                <p class="fw-bold">Required Amount: {{ $data->starting_price }} ~ {{ $data->final_price }}
                                </p>
                                <p class="fw-bold">Income: {{ $data->starting_income }} ~ {{ $data->final_income }}</p>
                                

                            </div>
                        </div>
                    @endif
                @endif
            @endforeach


        </div>
     


                                        </div>

                                        {{-- End Invices Patient --}}



                                        {{-- Start Receipt Patient  --}}


                                        {{-- End Receipt Patient  --}}

                                    </div>
                                </div>
                            </div>



   @include('web.Icone.icone')



    @endsection
    
    
