@if($paginator->hasPages())
<nav aria-label="Page navigation" class="navigation">
    <div class="container">
        
 
  <ul class="pagination pagination-lg  d-flex align-items-center justify-content-center m-0 Step">




    {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item   text-white d-flex align-items-center justify-content-center">
             <a class="text-white w-100" id="donotNext"  href="{{$paginator->nextPageUrl()}}">  Grad Now</a>
           </li>
            @else
            <li class="page-item disabled  text-white d-flex align-items-center justify-content-center">
            <a class="" href="#">  Grad Now</a>
             </li>

            @endif
  </ul>
     </div>
</nav>

@endif

