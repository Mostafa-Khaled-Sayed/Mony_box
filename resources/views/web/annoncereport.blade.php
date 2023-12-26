
@extends('web.layout')

@section('main')

<div class="Back">
            <h1>Get the order</h1>
            <p class="mt-3 fw-bold">Click "Grab now" button to get the order</p>

            <p class="mt-3 fw-bold">Order grabbing...the result will be shown below.</p>
            <!-- Button trigger modal -->
        <!-- Button trigger modal -->

             <div class=" container ">
                    <div class="bg-warning py-4  text-white ">
                        <h3 class="modal-title " id="exampleModalLongTitle ">Order-grabed successfully</h3>

                    </div>
                    <input type="hidden" name="" value="{{$total=0}}
                            @foreach (\App\Models\Profit::where('user_id',auth()->user()->id)->get() as $value )
                                    {{$total+=$value->profits}}
                            @endforeach">
                    <div class="modal-body bg-warning container">


                     @foreach ($Announcements as  $Announcement)
                        <div class="row bg-white mx-4 ">

                      @if($Announcement->Status == 'veduo')
                      <div class="col-md-12 mt-3">
                        <video  controls>
                              <source src="{{asset('/Announcement/viduo/'.$Announcement->file_name)}}" >
                            </video>
                             </div>
                      @endif
                      @if($Announcement->Status == 'img')

                            <div class="col-sm-6">
                                <div class="bg-white" >
                                <img  src="{{asset('/Announcement/img/'.$Announcement->file_name)}}" width="300px" height="200"  >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bg-white mt-3">
                               <p class="text-left">{{$Announcement->description}}</p>
                                </div>
                            </div>

                          @endif
                                    @if($Announcement->Status == 'link')

                                    <div class="co;-md-12">>
                                   <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item" src="{{$Announcement->file_name}}" allowfullscreen></iframe>
                 </div>
                </div>
                      @endif
                       @if(isset($Announcement->orderNumber))
                      <div class="col-sm-12 mt-5">
                        <div class=" ">
                      <div><p  class="text-left">Order number : <span>{{$Announcement->orderNumber}}</span></p> </div>

                    </div>
                      </div>
                         @endif
                         @if(isset($Announcement->orderTotal))
                       <div class="col-sm-12">
                        <div class=" ">

                      <p class="text-left">Order total : <span>{{$Announcement->orderTotal}}</span></p>

                    </div>
                      </div>
                      @endif
                       <div class="col-sm-12">
                        <div class="">


                      <p class="text-left">Commission fee : <span> {{ $Mony}}</span></p>
                    </div>
                      </div>
                      <div class="container12">
        <div class="content12">
            <p id="myText12"> Expect return</p>
            <input type="text" id="myInput12"  value="{{auth()->user()->scores->score + $Mony}}$" readonly>

        </div>
    </div>

          </div>
          <div class=" bg-warning   text-white d-flex align-items-center justify-content-center">
                             <form action="{{url('viewAnoun/store')}}" method="post">
                                  <input id="id" type="hidden" name="id" value="{{$Announcement->id}}" class="form-control">
                                  @csrf
 <input type="hidden"  name="myInput12"  value="{{auth()->user()->scores->score + $Mony}}" readonly>
 <input type="hidden"  name="mony"  value="{{$Mony}}" readonly>
                                  @if(!Auth::user()->announcements()->where('announcement_id', $Announcement->id)->first() )


                    <button type="submit" id="submitajax" class="Step  mb-3 w-100 p-1 mx-3 mt-3 text-white d-flex align-items-center justify-content-center">

                       Submit now
                    </button>

                    @endif
                    </div>
          @endforeach

                    </div>


                </div>
         


            <div class="container text-center mt-5">
                <h1>Result Today</h1>
                <p><img src="../IMG/SRA2.png" alt="" class="me-4" style="width: 50px;">---</p>
                <h4>My Total Assets</h4>
                <p>{{auth()->user()->scores->score}}</p>
                <div class="row">
                    <div class="Box col-md-6 col-lg-4 mt-5">
                        <div class="mt-5">
                            <h5 class="fw-bold">Grabbed / Total</h5>
                            @if ($Announcements->currentPage()<=$Announcements->total())
 <h6 class="pt-3"> {{$Announcements->currentPage()}}/{{($Announcements->total()+1)}}</h6>
                @endif


                        </div>
                    </div>

                    <div class="Box col-md-6 col-lg-4 mt-5">
                        <div class="mt-5">
                            <h5 class="fw-bold">Promotion bonus</h5>
                            <h6 class="pt-3">{{ $Mony}}</h6>
                        </div>
                    </div>
                    <div class="Box col-md-6 col-lg-4 mt-5">
                        <div class="mt-5">
                            <h5 class="fw-bold">Today's profits</h5>
                            <h6 class="pt-3">{{$total}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            {{--<a href=""
             style="background-color: #5c4db1;"
                class="Step m-5 w-100 p-1 text-white d-flex align-items-center justify-content-center ">Order-grab
                rules</a> --}}
        </div>
@endsection
@section('js')


@endsection
