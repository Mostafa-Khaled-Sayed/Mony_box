
@extends('web.layout')

@section('main')


<input type="hidden"  value="{{$total=0}}
                            @foreach (\App\Models\Profit::where('user_id',auth()->user()->id)->get() as $value )
                                    {{$total+=$value->profits}}
                            @endforeach">

<div class='container '>
<div class="d-flex lang-switch mt-3 mb-2 justify-content-end">
    <select class="">
        <option select></option>
        <option>العربية</option>
        <option>English</option>
    </select>
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#b9b8b8 " class="bi bi-globe" viewBox="0 0 16 16">
        <path
            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472M3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z"
        />
    </svg>
</div>

<div class='IMGS  w-100 '>
 <div id="carouselExampleSlidesOnly w-100"  class="carousel slide" data-ride="carousel">
  <div class="carousel-inner " style="padding: 10px 0 !important;">


@forelse ( $Photos as $index=>$Photo )
 @if(!$index)
  <div class="carousel-item active">

      <img class="d-block w-100 "  src="{{asset($onePhoto[0]->photo)}}"  alt="firist slide">

    </div>
@else
       <div class="carousel-item ">

      <img class="d-block w-100 " src="{{asset($Photo->photo)}}" alt="Second slide">

    </div>
    @endif
 @empty
   <h5>Not Found</h5>
 @endforelse



  </div>
</div>
    </div>


    <div class ="assets-card">

    <p class="assets-avatar"><img src='{{asset("IMG/mony.jpg")}}' alt='' class='me-3' />{{ Auth::user()->name }}</p>
    <hr>
    <div class="total-assets col-12">
        <h4 >My Total Assets</h4>
        <p>{{auth()->user()->scores->score}}</p>
    </div>

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
<hr />
@include('web.Icone.icone')



<div class='container text-left'>
    <h3>Task Lobby</h3>
    <div class='row'>

           @foreach ($datas as $data )

 @if( Auth::user()->scores->score < $data->final_price)
         @if( Auth::user()->scores->score >= $data->starting_price )

         <div class="Box col-md-6 col-lg-4 mt-2" >

            <div class="mt-1 IMG9 text-start" style="background-image: url('{{asset($data->photo)}}')">

                <a href="{{url('/step1/'.$data ->id)}}">
                    <p class="fw-bold">Required Amount: {{$data->starting_price}} ~ {{$data->final_price}} </p>
                    <p class="fw-bold">Income: {{$data->starting_income}} ~ {{$data->final_income}}</p>
                </a>

            </div>
        </div>

        @else
        <div  class="Box col-md-6 col-lg-4 mt-2">

            <div class="mt-2  IMG9 text-start dataClose" style="background-image: url('{{asset($data->photo)}}')">

                <p >
                    <p class="fw-bold">Required Amount: {{$data->starting_price}} ~ {{$data->final_price}} </p>
                    <p class="fw-bold">Income: {{$data->starting_income}} ~ {{$data->final_income}}</p>
                </p>

        </div>
        </div>
        @endif
        @endif
        @endforeach



</div>
  </div>
<div class='container text-left'>
    <div class="profit">
        <h3 class="fw-bold mb-3 mt-3">Profit classification</h3>
        <div class="outer">
            <ul class="inner list-unstyled m-0 ">
                @foreach($users as $user)
                <li class="d-flex profile-profit">
                   <img src="https://www.monyboxs.com/IMG/mony.jpg" alt="" class="me-3">
                   <p class="des-profit m-0 fw-bold">{{$user->name}} earns of  {{$user->score}}$</p>
                </li>
@endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal mt-5 fade" id="turn" tabindex="-1" role="dialog" aria-labelledby="payLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  bg-light">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Deposit</h5>

            </div>
            <div class="modal-body">
            <form action="{{route('TransferMony')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Code invention</label>
                    <input class="form-control" name='CodInvention' type="text" placeholder="enter code for user" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">amount</label>
                    <input class="form-control" id="taxMony" name="Mony" type="text" placeholder="Money" >
                    <br/>
                   <input type="text" id="Mony" name="Monydiscount" readonly />
            <input type="submit" class='Step mb-3  p-1 mt-3 text-white d-flex align-items-center justify-content-center'/>
            </form>

        </div>
    </div>
</div>
</div>



<script>
    $value=document. querySelector("#taxMony")
$value.addEventListener("input",function(){
    document.querySelector('#Mony').value=$value.value-($value.value * ({{$tax}}/100));
})

</script>

@endsection

