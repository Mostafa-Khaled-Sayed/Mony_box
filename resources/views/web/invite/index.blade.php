@extends('web.layout')

@section('main')
 <h1 class="text-center">From A Team To <br> Create Wealth</h1>
    <div class="  d-flex justify-content-center align-items-center">
           
           
            <div class=" invite d-flex justify-content-center align-items-center">
                
                 {!! QrCode::size(100)->generate('http://localhost/now/public/'.auth()->user()->code_invention
); !!}
            </div>


            </div>
        
@endsection
{{-- <div id="Pas" class="mt-4 text-center bg-Primary" style="border-radius: 8px;background: #48509e;
            padding: 10px;
            font-size: 25px;">
            <h1> --}}