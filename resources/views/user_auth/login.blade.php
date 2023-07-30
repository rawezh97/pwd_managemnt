@extends('layout')
@section('content')
<div class="head">

</div>
<div class="log_div">
    
    <div class="log">
        <form action="/login" method="POST">
            @if (session()->has('msg'))
                <div class="error_message">
                    {{session()->get('msg')}}
                </div>
            @elseif (session()->has('smsg'))
                <div class="suces_message">
                    {{session()->get('smsg')}}
                </div>
            @endif()
            @csrf
            <img src="images/pwd.jpg" class="login_img" alt="">
            <div class="input_div">
                <label class="log_lable" for="email">email</label>
                <input class="log_input email" type="text" name="email">
                <span class="error_msg">
                  @error('email')
                          {{$message}}
                  @enderror
              </span>
            </div>
            <div class="input_div">
                <label class="log_lable" for="password">password</label>
                <input class="log_input" type='password' name="password" id="password">
                <span class="error_msg">
                  @error('password')
                          {{$message}}
                  @enderror
              </span>
            </div>
            <div class="submit">
                <input type="submit" class="login_btn" value="Submit">
                <p>Dont have account <a href="/register">Regster</a></p>
            </div>
        </form>
     
    </div>
</div>
@endsection