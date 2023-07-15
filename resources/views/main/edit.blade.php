@extends('main.mainlayout')
@section('tr')



<form action="/del/27" method="post">
    @csrf
    <input type="submit">
</form>

@isset($data)
    @foreach ($data as $item)
        @foreach ($arr as $value)
            @if ($item->id == $value)

                <form action="/update/{{$item->id}}" method="POST">
                    
                    @csrf
                            <tr>
                                <td><input type="text" class="user_input"  name="source" value="{{$item->source}}"></td>
                                <td><input type="text" class="user_input" name="username" value="{{$item->username}}"></td>
                                
                                <td><input type="text" class="user_input" name="password" id="password{{$item->id}}" value="{{$item->password}}"></td>
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