@extends('main.mainlayout')
@section('tr')




@isset($data)
    @foreach ($data as $item)
        @foreach ($arr as $value)
            @if ($item->id == $value)

                <form action="/update/{{$item->id}}" method="POST">
                    
                    @csrf
                            <tr>
                                <td><input type="text" class="user_input"  name="source" value="{{$item->source}}"></td>
                                <td><input type="text" class="user_input" name="username" value="{{$item->username}}"></td>
                                
                                <td>
                                    <input type="text" class="user_input" name="password" id="password{{$item->id}}" value="{{$item->password}}">
                                    <span><a href="#" onclick="getpass()">genterate</a></span>
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

                                    </script>
                                </td>
                                <td><input type="text" class="user_input" name="link" value="{{$item->link}}"></td>
                                
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