@extends('main.mainlayout')
@section('tr')
@isset($data)
<form id="edit" action="/edit" method="POST">
    @csrf
    @foreach ($data as $item)
        @yield('edit')
        <tr>
            <td>{{$item->source}}</td>
            <td>{{$item->username}}</td>
            
            <td><input type="password" id="password{{$item->id}}" value="{{$item->password}}"><a href="#" id="btno" onclick="abas({{$item->id}})">abas</a></td>
            <script>
                function abas(id){
                     var password = document.getElementById("password"+id);
                     if (password.type == "password" ? password.type = "text" : password.type = "password");
                }  
             </script>
            <td>{{$item->link}}</td>
            <td><input type="checkbox" name="{{$item->id}}" value="{{$item->id}}"></td>
            
        </tr>   
        
        @endforeach
    </form>
@endisset
@endsection