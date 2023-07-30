@extends('layout')
@section('content')
@if (Auth::check())

<header>
    <a href="/logout" class="create_btn logout_color">Logout</a>
    @endif
    @if (session()->has('msg'))
        <span class="sucess_message">{{session()->get('msg')}} </span>  
        
    @endif
    @if (session()->has('error_msg'))
        <span class="error_message">{{session()->get('error_msg')}} </span>  
        
    @endif
    @if (session()->has('warning_check'))
        <span class="warning_message">{{session()->get('warning_check')}} </span>  
            
    @endif


</header>

<div class="big_div">

    <div class="big_head">
        <a href="/main"><img src="/images/pwd_logo.png" class="img_logo" alt=""></a>
        
        <div class="search">
            <form action="/search">
                <input type="text" name="search" placeholder="Search" class="input_search">
            </form>
        </div>
    
        <div class="acount_info">
            
            <div class="left_pro_part">
                <img src="/images/user.png" class="user_p" alt="">
                <div class="ac_info">
                    <span class="username">{{$user->name}}</span> <br>
                    <span class="email">{{$user->email}}</span> 
                </div>

            </div>
            <div class="user_ac">
                <span class="user"><a href="#" id="action" onclick="openForm()"><img class="dropDOwn" id="profile" src="/images/profile_pic.png" alt=""></a></span>


                <div class="form-popup" id="myForm">
                    <div class="form-container">
                        <div class="p_head">
                            <div class="profile_head">
                              <img src="/images/user.png" class="user_p" alt="">
                              <h1>Profile</h1>
                            </div>
                            <div class="num_item">
                              <span class="pro_equa"><span class="Contain">{{count($data)}}</span></span>
                            </div>

                        </div>
                        <hr>
                        <div class="usr_info">
                            <h3 for="username">Username : </h3><span class="pro_equa"> {{$user->name}}</span>

                        </div>
                      {{-- <input type="text" placeholder="Enter username" name="username" value="{{$user->name}}" required> --}}
                        
                      <div  class="usr_info">
                          <h3 for="email"><b>Email : </b> <span></span></h3>
                          <span class="pro_equa"> {{$user->email}}</span>                         
                      </div>

                      {{-- <input type="text" placeholder="Enter Email" name="email" value="{{$user->email}}" required> --}}
                      <div class="usr_info">
                          <h3 for="psw"><b>Created at : </b></h3>
                          <span class="pro_equa"> {{ $user->created_at}}</span>
                      </div>

                      {{-- <input type="password" placeholder="Enter Password" value="{{$user->password}}" name="psw" required> --}}
                  
                      <button id="action" onclick="modifyForm()" class="btn">Modify</button>
                      {{-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> --}}
                    </div>
                  </div>


                  
                  <div class="form-popup" id="modifyForm">
                    <form action="/update_User/{{Auth::id()}}" method="post" class="form-container">
                        @csrf
                        <div class="p_head">
                            <div class="profile_head">
                              <img src="/images/user.png" class="user_p" alt="">
                              <h1>Profile</h1>
                            </div>
                            <div class="num_item">
                              <span class="pro_equa"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="usr_info">
                            <h4 for="username">Username : </h4>
                        </div>
                      <input type="text" placeholder="Enter username" name="username" value="{{$user->name}}" required>
                        
                      <div  class="usr_info">
                          <h4 for="email">Email :</h4>               
                      </div>
                      <input type="text" placeholder="Enter Email" name="email" value="{{$user->email}}" required>

                      <div class="usr_info">
                          <h4 for="psw"><b>New Password : </b></h4>
                      </div>
                      <input type="password" placeholder="Enter Password"  name="password" value="" required>
                  
                      <button type="submit" class="btn up rb">Update</button>
                      <button type="button" class="btn cancel db" onclick="closeForm()">Delete Acount</button>
                    </form>
                  </div>
                  <script>
                    function openForm() {
                      document.getElementById("myForm").style.display = "block";
                      document.getElementById("profile").src = "/images/close.png";
                      document.getElementById("action").onclick = closeForm;
                      
                    }
                    function modifyForm() {
                    //   document.getElementById("myForm").style.display = "none";
                      document.getElementById("modifyForm").style.display = "block";
                      document.getElementById("action").onclick = closeForm;
                    //   document.getElementById("profile").src = "/images/close.png";
                    //   document.getElementById("action").onclick = "closeForm()";
                    }
                    
                    function closeForm() {
                        document.getElementById("action").onclick = openForm;
                        document.getElementById("profile").src = "/images/profile_pic.png";
                      document.getElementById("myForm").style.display = "none";
                      document.getElementById("modifyForm").style.display = "none";
                    
                    }
                    </script>
            
                
            </div>
        </div>
    </div>

    <div class="option_div">
        <div class="create">
            <a href="/create" class="create_btn c_color ">Create<img src="/images/dashboard.png" class="logo_png create_logo" alt=""></a>
        </div>
        
        <div class="modifie_btn">
            <a href="#" class="create_btn" onclick="submitFunction()">Edit <img src="/images/edit.png" class="logo_png" alt=""></a>
            <a href="/create" class="create_btn">Copy</a>
            <a href="/export" class="create_btn">Export <img class="logo_png" src="/images/file-export.png" alt=""></a>
            <a href="/create" class="create_btn">More</a>
        </div>

        <script>
            function submitFunction (){
                document.getElementById('edit').submit();
            }
        </script>

        
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
                    @if (!Request::is('create'))
                        <th>Security</th>
                    @endif
                    <th>link</th>
                    <th>Select</th>
                </tr>
                @yield('tr')
                {{-- @isset($data)
                <form id="edit" action="/edit" method="POST">
                    @foreach ($data as $item)
                        @csrf
                        @yield('edit')
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
                            <td><input type="checkbox" name="{{$item->id}}" value="{{$item->id}}"></td>
                            
                        </tr>   
                        
                        @endforeach
                    </form>
                @endisset --}}
                <div>
                    @yield('con')
                </div>
    
            </tbody>
        </table>
    </div>

</div>    



@endsection