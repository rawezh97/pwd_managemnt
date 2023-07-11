@extends('layout')
@section('content')


@if (session()->has('msg'))
    <div class="message">
        {{session()->get('msg')}}
        
    </div>
@endif
<div class="log_reg">
    <a href="/login" class="abtn"> login</a>
    <a href="/register" class="abtn"> register</a>

</div>



@endsection