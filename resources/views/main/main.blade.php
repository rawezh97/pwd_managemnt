@extends('layout')
@section('content')
@if (Auth::check())

<header>
    <a href="/logout" class="create_btn">Logout</a>
    @endif
    @if (session()->has('msg'))
   <span class="sucess_message">{{session()->get('msg')}} </span>  
@endif


</header>

<div class="big_div">

    <div class="big_head">
        <a href="/main"><img src="/images/pwd_logo.png" class="img_logo" alt=""></a>
        
        <div class="search">
            <form action="">
                <input type="text" name="search" placeholder="Search" class="input_search">
            </form>
        </div>
    
        <div class="acount_info">
            <img src="/images/user.png" class="user_p" alt="">
            <div class="ac_info">
                <span class="username">{{$user->name}}</span>
                <span class="email">{{$user->email}}</span> 
            </div>
            <span class="user"><a href="">?</a></span>
        </div>
    </div>

    <div class="option_div">
        <div class="create">
            <a href="/create" class="create_btn c_color ">Create</a>
        </div>
        
        <div class="modifie_btn">
            <a href="/create" class="create_btn">Edit</a>
            <a href="/create" class="create_btn">Copy</a>
            <a href="/create" class="create_btn">Export</a>
            <a href="/create" class="create_btn">More</a>
        </div>

        <div class="help">
            
            <a href="" class="create_btn help">help</a>
        </div>
    </div>

    
    <div class="tb">
        <table>
            <tbody>
                <tr class="h">
                    <th>source</th>
                    <th>username</th>
                    <th>password</th>
                    <th>link</th>
                    <th>faviorte</th>
                </tr>
                @isset($data)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item->source}}</td>
                            <td>{{$item->username}}</td>
                            
                            <td><input type="password" id="password{{$item->id}}" value="{{$item->password}}"><button id="btn" onclick="abas()">abas</button></td>
                            <script>
                                function abas(){
                                     var password = document.getElementById("{{'password'.$item->id}}");
                                     if (password.type == "password" ? password.type = "text" : password.type = "password");
                                }  
                             </script>
                            <td>{{$item->link}}</td>
                            <td><input type="checkbox" name="checkbox" value="{{$item->id}}"></td>
                        </tr>   
                    @endforeach
                @endisset
                <div>
                    @yield('con')
                </div>
    
            </tbody>
        </table>
    </div>

</div>    



@endsection