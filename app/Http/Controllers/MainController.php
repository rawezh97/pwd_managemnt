<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        $data = DB::table('manages')->where('userid' , Auth::id())->get();
        $user = User::find(Auth::id());
        return view('main.main' ,['data' => $data , 'user' => $user]);
    }
    public function create()
    {
        $data = DB::table('manages')->where('userid' , Auth::id())->get();
        $user = User::find(Auth::id());
        return view('main.create',['data' => $data , 'user' => $user]);
    }

    public function store(Request $request)
    {
        $table = new Manage();
        $table->source = $request->source;
        $table->username = $request->username;
        $table->password = $request->password;
        $table->link = $request->link;
        $table->userid = Auth::id();

        $table->save();

        return redirect('/main')->with(['msg' => 'Created Successfully']);
    }
}
