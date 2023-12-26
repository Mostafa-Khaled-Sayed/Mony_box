
@extends('web.layout')

@section('main')

<div class="Back">
    <div class=" container ">
        <div class="assets-card propaganda-header">
            <h5 class="fw-bold">Get the order</h5>
            <p class=" fw-bold">Click "Grab now" button to get the order</p>
            <p class="fw-bold m-0">Order grabbing...the result will be shown below.</p>
        </div>
    </div>
            <!-- Button trigger modal -->
        <!-- Button trigger modal -->

             <div class=" container " style="border: 8px solid orange;border-radius: 8px;width: 94%;margin:15px auto;">
                    <div class="py-4 assets-card ">
                        <h6 class="modal-title fw-bold " id="exampleModalLongTitle ">Order-grabed successfully</h6>

                    </div>
                    <input type="hidden" name="" value="{{$total=0}}
                            @foreach (\App\Models\Profit::where('user_id',auth()->user()->id)->get() as $value )
                                    {{$total+=$value->profits}}
                            @endforeach">
                    <div class="modal-bodyform


                     @foreach ($Announcements as  $Announcement)
                        <div class="row  p-0 ">

                      @if($Announcement->Status == 'veduo')
                      <div class="col-md-12 mt-3">
                        <video  controls>
                              <source src="{{asset('upload/Announcement/viduo/'.$Announcement->file_name)}}" >
                            </video>
                             </div>
                                                        <div class="assets-card">
                            <div class="col-sm-12 ">
                                <div class="bg-white m-0 ">
                               <p class="text-left fw-bold m-0">{{$Announcement->description}}</p>
                                </div>
                            </div>
</div>
                      @endif
                      @if($Announcement->Status == 'img')

                            <div class="col-sm-12 p-0">
                                <div class="" >
                                <img  src="{{asset('upload//Announcement/img/'.$Announcement->file_name)}}" width="300px" height="200"  >
                                </div>
                            </div>
                            <div class="assets-card">
                            <div class="col-sm-12 ">
                                <div class="bg-white m-0 ">
<p class="text-left fw-bold m-0"> {{$Announcement->description}} </p>  
   
                              </div>
                            </div>
</div>
                          @endif
                                    @if($Announcement->Status == 'link')

                                    <div class="co;-md-12">>
                                   <div class="embed-responsive embed-responsive-16by9 ">
                     <iframe class="embed-responsive-item" src="{{$Announcement->file_name}}" allowfullscreen></iframe>
                 </div>
                </div>
                                           <div class="assets-card">
                            <div class="col-sm-12 ">
                                <div class="bg-white m-0 ">
                              <p class="text-left fw-bold m-0"> {{$Announcement->description}} </p>  
   
   </div>
                            </div>
</div>
                      @endif
                       @if(isset($Announcement->orderNumber))
                       <div class="">
                      <div class="col-sm-12 mt-1">
                        <div class=" assets-card">
                      <div><p  class="text-left m-0">Order number : <span>{{$Announcement->orderNumber}}</span></p> </div>

                    </div>
                      </div>
                       <div class="col-sm-12 mt-1">
                           <div class="d-flex date justify-content-center flex-row assets-card assets-card">
                            
                               <!--<p>{{\Carbon\Carbon::now()}}</p>-->
                               <!--<p class="mb-0 mr-5">{{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</p>-->
                               
                              <p class="mb-0 mr-5">{{ date('Y-m-d H:i:s a') }}</p>
                           </div>
                           </div>
                         @endif
                         @if(isset($Announcement->orderTotal))
                       <div class="col-sm-12">
                        <div class="assets-card ">

                      <p class="text-left m-0">Order total : <span>{{$Announcement->orderTotal}}</span></p>

                    </div>
                      </div>
                      @endif
                       <div class="col-sm-12">
                        <div class="assets-card">


                      <p class="text-left m-0">Commission fee : <span> {{ $Mony}}</span></p>
                    </div>
                      </div>
                      </div>
                      <div class="container12">
        <div class="content12 ">
            <p id="myText12"> Expect return</p>
            <input type="text" id="myInput12"  value="{{auth()->user()->scores->score + $Mony}}$" readonly>

        </div>
    </div>

          </div>
          <div class=" text-white d-flex align-items-center justify-content-center">
                             <form action="{{url('viewAnoun/store')}}" method="post" class="w-100">
                                  <input id="id" type="hidden" name="id" value="{{$Announcement->id}}" class="form-control">
                                  @csrf
 <input type="hidden"  name="packageId"  value="{{$id}}" readonly>
 <input type="hidden"  name="annonceId"  value="{{$Announcement->id}}" readonly>
 <input type="hidden"  name="myInput12"  value="{{auth()->user()->scores->score + $Mony}}" readonly>
 <input type="hidden"  name="mony"  value="{{$Mony}}" readonly>
                                  @if(!Auth::user()->announcements()->where('announcement_id', $Announcement->id)->first() )


                    <button type="submit" id="submitajax" class="Step w-100 text-white d-flex align-items-center justify-content-center">

                       Submit now
                    </button>

                    @endif
                    </div>
          @endforeach

                    </div>


                </div>
         {{$Announcements->links('web.pagination.paginator')}}


        <div class="container mb-5">
               <h6 class="assets-card">Result Today</h6>
            <div class ="assets-card text-justify">
                <p class="assets-avatar"><img src='{{ asset("IMG/mony.jpg") }}' alt="" class="me-4" >---</p>
                    <hr>
                <div class="total-assets col-12">
                    <h4>My Total Assets</h4>
                    <p>{{auth()->user()->scores->score}}</p>
                </div>
           
                <div class="row">
                    <div class="box col-4">
                        <div class="">
                            <h6 class="fw-bold">Grabbed / Total</h6>
                            @if ($Announcements->currentPage()<=$Announcements->total())
 <h6 class="fw-bold"> {{auth()->user()->daliy_counter_announce}}/{{($Announcements->total())}}</h6>
                @endif


                        </div>
                    </div>

                    <div class="box col-4 ">
                        <div class="">
                            <h6 class="fw-bold">Promotion bonus</h6>
                            <h6 class="fw-bold">{{ $Mony}}</h6>
                        </div>
                    </div>
                    <div class="box col-4">
                        <div class="">
                            <h6 class="fw-bold">Today's profits</h6>
                            <h6 class="fw-bold">{{$total}}</h6>
                        </div>
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



