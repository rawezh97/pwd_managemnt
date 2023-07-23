@extends('main.mainlayout')
@section('tr')
@isset($data)
<form id="edit" action="/edit" method="POST">
    @csrf
    @foreach ($data as $item)
        @yield('edit')
        <tr>
            <td>{{$item->source}}</td>
            <td>{{decrypt($item->username)}}</td>
            
            <td>
                @if (Request::is('search'))
                <input type="password" {{ $item->password ? 'abas' : '' }} id="password{{$item->id}}" value="{{decrypt($item->password)}}">
                    
                @endif
                @if (!Request::is('search'))
                <input type="password" {{ $item->password ? 'abas' : '' }} id="password{{$item->id}}" value="{{decrypt($item->password)}}">
                    
                @endif
                <a href="#" id="btno" class="eye" onclick="abas({{$item->id}})">
                    <img class="eyeimg" id="eyeimage{{$item->id}}" src="/images/view.png" alt="">
                </a>

            </td>
            @if (!Request::is('create'))
                
                <td>
                    @php
                        $password = decrypt($item->password);
                        $reg = preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/' , $password);
                        $capital = preg_match('/[A-Z]/', $password);
                        $num_check = preg_match('/[0-9]/', $password);

                        if(Str::length($password) >= 8  && $reg && $capital && $num_check){
                            echo "<span style='color: green'>password is Strong</span>";
                        }
                        elseif (Str::length($password) >= 8 && $reg && $num_check) {
                            echo "<span style='color: rgb(255, 145, 0)'>password is Mediuam</span>";
                        }
                        elseif (Str::length($password) > 9 && !$reg && $capital && $num_check) {
                            echo "<span style='color: rgb(255, 145, 0)'>password is Mediuam</span>";
                        }
                        elseif (Str::length($password) > 10) {
                            echo "<span style='color: rgb(255, 145, 0)'>password is Mediuam</span>";
                        }
                        else {
                            echo "<span style='color: rgb(255, 64, 16)'>password is Weak</span>";

                        }
                    
                     @endphp
                    
                </td>
            @endif
            <script>
                function abas(id){
                    var password = document.getElementById("password"+id);
                    var eye = document.getElementById("eyeimage"+id);
                    if(password.type == "password" ? eye.src="/images/eye.png" : eye.src="/images/view.png");
                     if (password.type == "password" ? password.type = "text" : password.type = "password");
                }  
             </script>
            <td>{{decrypt($item->link)}}</td>
            <td><input type="checkbox" name="{{$item->id}}" value="{{$item->id}}"></td>
            
        </tr>   
        
        @endforeach
    </form>
@endisset
@endsection