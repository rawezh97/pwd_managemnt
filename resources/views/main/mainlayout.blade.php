@extends('layout')
@section('content')


<header>

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
        <a href="/start"><img src="/images/pwd_logo.png" class="img_logo" alt=""></a>
        
        <div class="search">
            <form action="/search">
                <input type="text" name="search" placeholder="Search" class="input_search">
            </form>
        </div>
    
       
    </div>

    <div class="option_div">
        <div class="create">
            <a href="/create" class="create_btn c_color ">Create<img src="/images/dashboard.png" class="logo_png create_logo" alt=""></a>
        </div>
        
        <div class="modifie_btn">
            <a href="#" class="create_btn" onclick="submitFunction()">Edit <img src="/images/edit.png" class="logo_png" alt=""></a>
            {{-- <a href="/create" class="create_btn">Copy</a> --}}
            <a href="/export" class="create_btn">Export <img class="logo_png" src="/images/file-export.png" alt=""></a>
            <a href="/create" class="create_btn">More</a>
            <a href="" class="create_btn">help</a>

        </div>

        <script>
            function submitFunction (){
                document.getElementById('edit').submit();
            }
        </script>

        
        <div class="help">
            <a href="#" class="create_btn help" title="Total">total</a>
        </div>
    </div>

    <div class="tb">
        <table>
            <tbody>
                <tr class="h">
                    <th>source</th>
                    <th>username</th>
                    <th>password</th>
                    <th>Security</th>
                    <th>link</th>
                    <th>Select</th>
                </tr>
                @yield('tr')
               
                <div>
                    @yield('con')
                </div>
    
            </tbody>
        </table>
    </div>

</div>    



@endsection