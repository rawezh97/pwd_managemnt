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
                @error('username')
                    {{$message}}
                @enderror
            </div>
            <div class="input_div">
                <label class="log_lable" for="email">email</label>
                <input class="log_input email" type="text" name="email">
                @error('email')
                        {{$message}}
                @enderror
            </div>
            <div class="input_div">
                <label class="log_lable" for="password">password</label>
                <input class="log_input" type="text" name="password">
                @error('password')
                    {{$message}}
                @enderror
            </div>
            <div class="submit">
                <input type="submit"  value="Submit">
                <p>Already have account <a href="/login">Login</a></p>
            </div>
        </form>

    </div>
</div>
@endsection