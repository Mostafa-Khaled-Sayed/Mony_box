@extends('web.layout')

@section('main')
<div class='container text-center mt-5'>
    <h1>History</h1>
    <br>
    <div class='row'>
               
        @include('web.reports.reports')
    </div>
</div>

@endsection
