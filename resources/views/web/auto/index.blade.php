 <div class='container mt-2'>
    
     <div class='row' id="Row">

         @forelse ($autodata as $auto)

             <div class="col-md-6 col-lg-4">
                 <div class="assets-card">
                 <a href="{{route('autodata.show',$auto->id)}}">
                 <div class="d-flex ">
                     <div class="p-2 w-75">
                         <h4 class="">{{ $auto->title }} : {{ $auto->price }} $</h4>
                         <p class="text-left">{{ $auto->desc }}</p>
                     </div>

                     <div class=" w-25 ml-auto   d-flex justify-content-end  d-flex align-items-center">
                         <img class="img-fluid" src="{{ $auto->photo }}" alt="VP">
                     </div>



                 </div>


</a>
</div>
             </div>

         @empty
             <h1>new isnot any data</h1>
         @endforelse
     </div>

 </div>
