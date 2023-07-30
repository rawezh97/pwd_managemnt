@extends('main.mainlayout')
@section('tr')
@isset($data)
<form id="edit" action="/edit" method="POST">
    @csrf
    @foreach ($data as $item)
        @yield('edit')
        <tr>
            <td >{{$item->source}}</td>
            <td class="lr">
                <div></div>
                <div class="usr">
                    <span id="username{{$item->id}}">{{decrypt($item->username)}}</span>
                </div>
                <div class="cpy_btn">
                    <a href="#" onclick="copyusr({{$item->id}})"><img src="/images/copy.png" class="copy" alt=""></a>
                </div>

            
            
            </td>
            
            <td>
                @if (Request::is('search'))
                <input type="password" {{ $item->password ? 'abas' : '' }} id="password{{$item->id}}" value="{{decrypt($item->password)}}">
                    
                @endif
                @if (!Request::is('search'))
                <input type="password" {{ $item->password ? 'abas' : '' }} id="password{{$item->id}}" value="{{decrypt($item->password)}}">
                    
                @endif
                
                <a href="#" onclick="copypwd({{$item->id}})"><img src="/images/copy.png" class="copy" alt=""></a>

                <script>
                    function copypwd(id){
                        var text = document.getElementById("password"+id);
                        text.select();
                        navigator.clipboard.writeText(text.value);
                        // alert('coped');
                    }
                    function copyusr(id){
                        var copyText = document.getElementById("username"+id);
                        var textArea = document.createElement("textarea");
                        textArea.value = copyText.textContent;
                        document.body.appendChild(textArea);
                        textArea.select();
                        document.execCommand("Copy");
                        textArea.remove();                        
                        // navigator.clipboard.writeText(text,textContent);
                        // alert('coped');
                    }
                </script>


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
                        elseif (Str::length($password) >= 8 || ($reg && $num_check)) {
                            echo "<span style='color: rgb(255, 145, 0)'>password is Mediuam</span>";
                        }
                        elseif (Str::length($password) > 10 && !$reg && $capital && $num_check) {
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
            <td class="lr">
                <div></div>
                <div>
                    {{decrypt($item->link)}} 
                </div>
                <div>
                    <a href="{{decrypt($item->link)}}" target="_blank" class="create_btn">open</a></td>
                </div>
            <td><input type="checkbox" name="{{$item->id}}" value="{{$item->id}}"></td>
            
        </tr>   
        
        @endforeach
    </form>
@endisset
@endsection