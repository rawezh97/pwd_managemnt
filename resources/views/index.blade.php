@extends('layout')
@section('content')


<header class="index_header">
    <div class="logo_left">
        <img src="/images/pwd_logo.png" class="index_logo" alt="">
    </div>
    <div class="getstart_rigth">
        <a href="/start" class="getstart">Get Started</a>
        <a href="/#" class="getstart about">About Us</a>
    </div>
</header>

<div class="index_content">

    <div class="logo_idintify">
        <div class="img_p">
            <img src="/images/16205.png" class="main_logo" alt="">
            <span class="text">Password Managemnt System</span>
            <span class="text2">Scure , Save Time , Easy to use</span>

        </div>
    </div>

    <div class="secound_part">
        <div class="paragraph first">
            <h2 class="p_head">Password Auto checkup </h2>
            <span class="description"> check password if it's a weak password warning 
                and also provide the strong password
            </span>
        </div>
        <div class="gif">
            
            <img src="/images/security.png" class="index_img" alt="">
        </div>
    </div>


    <div class="secound_part third">
        <div class="paragraph test">
            <h2 class="p_head">Password Generator</h2>
            <span class="description">our system provide a password generation feature 
                that help you to generate a strong password 
            </span>
        </div>
        <div class="gif">
            
            <img src="/images/amico.png" class="index_img" alt="">
        </div>
    </div>
    <div class="secound_part">
        <div class="paragraph test2">
            <h2 class="p_head">Every thing in your hand</h2>
            <span class="description"> The collection of your data is not come to our DB 
                this application store every thing in your system 
                that mean we dont have ability to know your priavce
            </span>
        </div>
        <div class="gif">
            
            <img src="/images/type.png" class="index_img" alt="">
        </div>
    </div>

</div>





    <div class="foot_fotter">
        <img src="/images/peshawa.png" class="peshawa" alt="">

    </div>



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