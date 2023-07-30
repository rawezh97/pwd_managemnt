{{-- @extends('layout')
@section('content') --}}
    {{-- <div class="create_div">
        <form action="/store" method="POST" class="create_form">
            @csrf
            <div class="form_op">
                <label for="source" class="labe">source</label>
                <input type="text" name="source" class="inp">
            </div>
            <div class="form_op">
                <label for="username" class="labe">username</label>
                <input type="text" name="username" class="inp">
            </div>
            <div class="form_op">
                <label for="password" class="labe">password</label>
                <input type="text" name="password" class="inp">
            </div>
            <div class="form_op">
                <label for="link" class="labe">link</label>
                <input type="text" name="link" class="inp">
            </div>

            <input type="submit" class="submit">
        </form>
    </div> --}}

    {{-- <header>
        <a href="/logout" class="create_btn">Logout</a>

        @if (session()->has('msg'))
            {{session()->get('msg')}}
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
                                <td><input type="checkbox" name="" id=""></td>
                            </tr>   
                            @endforeach
                    @endisset
                        <form action="/store" method="POST">
                            @csrf
                                <tr>

                                    <td><input type="text" name="source" placeholder="Source" class="create_input"></td>
                                    <td><input type="text" name="username" placeholder="Username" class="create_input"></td>
                                    <td><input type="password" name="password" placeholder="Password" class="create_input"></td>
                                    <td><input type="text" name="link" placeholder="link" class="create_input"></td>  
                                    <td><input type="submit"></td>
                                        
                                </tr>   
                        </form>
                </tbody>
            </table>
        </div>
    
    </div>    
     --}}

{{-- @endsection --}}

@extends('main.main')
@section('con')
<form action="/store" id="createForm" method="POST">
    @csrf
        <tr>

            <td><input type="text" name="source" placeholder="Source" class="create_input"></td>
            <td><input type="text" name="username" placeholder="Username" class="create_input"></td>
            <td><input type="password" name="password" placeholder="Password" class="create_input"></td>
            <td><input type="text" name="link" placeholder="link" class="create_input"></td> 
            <td><input type="submit" class="edit_btn"></td>
                
        </tr>   
</form>
<script>
    window.onload = function() {

// Check for LocalStorage support.
if (localStorage) {

  // Add an event listener for form submissions
  document.getElementById('createForm').addEventListener('submit', function() {
    // Get the value of the name field.
    var source = document.getElementById('source').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var link = document.getElementById('link').value;

    // Save the name in localStorage.
    localStorage.setItem([source,username,password,link]);
  });

}

}
</script>
@endsection
