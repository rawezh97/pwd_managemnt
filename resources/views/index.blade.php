@extends('layout')
@section('content')


<header class="index_header">
    <div class="logo_left">
        <img src="/images/pwd_logo.png" class="index_logo" alt="">
    </div>
    <div class="getstart_rigth">
        <a href="/login" class="getstart">Get Started</a>
    </div>
</header>









{{-- @if (session()->has('msg'))
    <div class="message">
        {{session()->get('msg')}}
        
    </div>
@endif
<div class="log_reg">
    <a href="/login" class="abtn"> login</a>
    <a href="/register" class="abtn"> register</a>

</div> --}}


@endsection