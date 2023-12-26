<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONY BOXS</title>
      <meta content="mony" name="description">
     <meta content="mony" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('IMG/mony.jpg')}}" rel="icon">
  <link href="{{asset('IMG/mony.jpg')}}" rel="apple-touch-icon">
     <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="{{asset("web/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("web/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("web/main-style.css?v=1.0.6")}}">
   <link rel="stylesheet" href="{{asset("web/custommm-style.css")}}">


      
    </head>

<body>
   
       
      <div id="root">
  
      @yield('main')
          
    
   
 
    </div>
      <br><br><br><br> <br>
<footer class=" w-100 d-flex main-footer">
  
    <ul class = "w-100 list-unstyled d-flex  align-items-center m-0 ">
         <li class="d-inline  ">
            
            <a class=" footer-icon" aria-current="page" href="{{url('/home')}}"><img
                                    src="{{asset("IMG/Home.png")}}" alt="">Home</a>
         </li>
         <li class="d-inline ">
             <a class="footer-icon" href="{{route('reborts.index')}}"><img src="{{asset("IMG/History.png")}}"
                                    alt="">History</a>
         </li>
         
             <?php 
       $tele =App\Models\Setting::select('instegram','logo')->get()->take(1);
         ?>
         <li class="d-inline ml-1 footer-logo">
             
                            <a class="footer-icon " href="{{url('/mony-Box')}}"><img src="{{asset($tele[0]->logo)}}" alt=""
                                    class="SRA"></a>
                        
         </li>
       
            <li class="d-inline ">
             
                             <a class="footer-icon" href="{{$tele[0]->instegram}} "><img src="{{asset("IMG/Services.png")}}"
                                    alt="">Services</a>
                        
         <li class="d-inline">  <a class="footer-icon" href="{{url('/profile')}}"><img src="{{asset("IMG/Profile.png")}}"
                                    alt="">Profile</a></li>
      </ul>


</footer>


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
 <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

    <script src="{{asset("web/all.min.js")}}"></script>
    <script src="{{asset("web/bootstrap.bundle.js")}}"></script>
    <script src="{{asset("web/main-custom.js")}}"></script>
{!! Toastr::message() !!}
        @yield('js')
</body>

</html>