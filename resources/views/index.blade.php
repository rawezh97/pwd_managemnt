@extends('layout')
@section('content')


<header class="index_header">
    <div class="logo_left">
        <img src="/images/pwd_logo.png" class="index_logo" alt="">
    </div>
    <div class="getstart_rigth">
        <a href="/start" class="getstart">Get Started</a>
        <a href="https://github.com/rawezh97/pwd_managemnt" target="_blank"><img class="git" src="/images/github2.png" alt=""></a>
        {{-- <a href="/#" class="getstart about"></a> --}}

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
            <span class="description"> We're always checking your passwords. If we find a weak one, we'll tell you and help you make it stronger. Keeping you safe is what matters most to us.
            </span>
        </div>
        <div class="gif">
            
            <img src="/images/security.png" class="index_img" alt="">
        </div>
    </div>


    <div class="secound_part third">
        <div class="paragraph test">
            <h2 class="p_head">Password Generator</h2>
            <span class="description">Struggling to create strong passwords? 
                Our system can generate robust passwords for you, making your online life more secure.
            </span>
        </div>
        <div class="gif">
            
            <img src="/images/amico.png" class="index_img" alt="">
        </div>
    </div>
    <div class="secound_part">
        <div class="paragraph test2">
            <h2 class="p_head">Open Source</h2>
            <span class="description"> This project is open source, meaning anyone can review and access the application's source code.
            </span>
        </div>
        <div class="gif">
            <img src="/images/opensource.png" class="index_img hub" alt="">
        </div>
    </div>


    <div class="secound_part third">
        <div class="paragraph test2">
            <h2 class="p_head">Every thing in your hand</h2>
            <span class="description"> Rest assured, your data stays with you. We don't gather your information, everything is stored on your device. Your privacy remains intact.
            </span>
        </div>
        <div class="gif">
            
            <img src="/images/type.png" class="index_img" alt="">
        </div>
    </div>
    




</div>





    <div class="foot_fotter">
       <a href=""></a> <img src="/images/peshawa.png" class="peshawa" alt="">

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