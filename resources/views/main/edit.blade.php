@extends('main.mainlayout')
@section('tr')




@isset($data)
    @foreach ($data as $item)
        @foreach ($arr as $value)
            @if ($item->id == $value)

                <form action="/update/{{$item->id}}" method="get">
                    
                    @csrf
                            <tr>
                                <td><input type="text" class="user_input"  name="source" value="{{$item->source}}"></td>
                                <td><input type="text" class="user_input" name="username" value="{{decrypt($item->username)}}"></td>
                                
                                <td>
                                    <input type="text" class="user_input" name="password" id="password{{$item->id}}" value="{{decrypt($item->password)}}">
                                    {{-- <span><a href="#" onclick="getpass()">genterate</a></span>
                                    <script>
                                        <?php $pasword = "password{{$item->id}}" ?>
                                        alert($pasword);
                                        function getpass() 
                                        {
                                            var chars = "0123456789~!@#$%^&*()_+}{[]|abcdefghikjlmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                                            var pass = "";
                                            var passLength = 16;
                                            for (var i = 0; i < passLength; i++) {
                                                var randPass = Math.floor(Math.random() * chars.length);
                                                pass += chars.substring(randPass, randPass+1);
                                            }
                                            document.getElementById('password32').value = pass;
                                        }

                                    </script> --}}
                                </td>
                                <td>
                    @php
                        $password = decrypt($item->password);
                        $reg = preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/' , $password);
                        $capital = preg_match('/[A-Z]/', $password);
                        $num_check = preg_match('/[0-9]/', $password);

                        if(Str::length($password) > 5 && $reg && $capital && $num_check){
                            echo "<span style='color: green'>password is Strong</span>";
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
                                <td><input type="text" class="user_input" name="link" value="{{decrypt($item->link)}}"></td>
                                
                                <td> 
                                    <input type="submit" class="update_btn" value="update">
                                    <div class="action_div">
                                        <a href="/delete/{{$item->id}}" class="basket_a"> <img src="/images/red_basket.png" class="basket" alt=""></a>
                                        {{-- <button type="submit" class="basket_a" formaction="/delete/{{$item->id}}">abas</button> --}}
                                    

                                    </div>
                                
                                </td>
                                
                            </tr>  
            
                        @endif
                @endforeach

            </form>
            @endforeach
@endisset


@endsection