@extends('layout')
@section('content')

<div class="log_div">

    <div class="log">
        <form action="/register" method="POST">
            @csrf
            @if (session()->has('msg'))
                <div class="error_message">
                    {{session()->get('msg')}}
                </div>    
            @endif()
            <img src="images/reg.jpg" class="login_img reg" alt="">
            <div class="input_div">
                <label class="log_lable" for="username">username</label>
                <input class="log_input" type="text" name="username">
                <span class="error_msg">
                    @error('username')
                        {{$message}}
                    @enderror
                </span>
            </div>
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
                <input class="log_input" type="text" name="password">

                <span class="error_msg">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>

            </div>
            <div class="submit">
                <input type="submit" class="login_btn" value="Submit">
                <p>Already have account <a href="/login">Login</a></p>
            </div>
        </form>

    </div>
</div>
@endsection