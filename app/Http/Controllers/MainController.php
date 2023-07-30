<?php

namespace App\Http\Controllers;

use export;
use App\Models\User;
use App\Models\Manage;
use Vtiful\Kernel\Excel;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use function PHPSTORM_META\type;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel;

use Illuminate\Support\Facades\Crypt;
use Psy\VersionUpdater\Downloader\FileDownloader;

class MainController extends Controller
{
    public function index()
    {
        $data = DB::table('manages')->where('userid' , Auth::id())->get();
        $user = User::find(Auth::id());

        return view('main.main' ,['data' => $data , 'user' => $user]);
    }

    public function search(Request $request){
        
        $user = User::find(Auth::id());
        $search = $request->search;
        $data = Manage::where(function($query) use ($search){
            $query->where('source','like',"%$search%")->where('userid' , Auth::id());
        })->get();

        return view('main.main' , ['data' => $data , 'user'=>$user]);
    }

    public function create()
    {
        $data = DB::table('manages')->where('userid' , Auth::id())->get();
        $user = User::find(Auth::id());
        return view('main.create',['data' => $data , 'user' => $user]);
    }

    public function store(CreateRequest $request)
    {
        $request->method('post');
        $table = new Manage();
        $table->source = $request->source;
        $table->username = encrypt($request->username);
        $table->password = encrypt($request->password);
        $table->link = encrypt($request->link);
        $table->userid = Auth::id();

        $table->save();

        return redirect('/main')->with(['msg' => 'Created Successfully']);
    }
    
    public function edit(Request $request)
    {
        $request->isMethod('post') ;
        $data = $request->except(['_token']);
        $arr = [];
        foreach ($data as $value) {
            // echo ($value);
            array_push($arr,$value);
        }

        // print_r($arr);
        
        $data = DB::table('manages')->where('userid' , Auth::id())->get();
        $user = User::find(Auth::id());
        return view('main.edit',['data' => $data , 'user' => $user])->with('arr',$arr);
    }
    
    public function update(Request $request,$id)
    {
        // $request->isMethod('post') ;
        // dd($request->all());        
        $table = Manage::find($id);
        $table->source = $request->source;
        $table->username = $request->username;
        $table->password = Crypt::encrypt($request->password);
        $table->link = $request->link;
        $table->userid = Auth::id();

        $table->save();

        return redirect('/edit')->with(['msg' => 'Created Successfully']);
    }
    
    public function delete($id)
    {
        
        Manage::destroy($id);
        return redirect('/edit')->with(['msg' => 'Successfully Deleted']);
    }
    
    public function export(){
        $data = DB::table('manages')->select('source','username','password','link')->where('userid',Auth::id())->get();
        $data = json_decode(json_encode($data), true);
        (new FastExcel($data))->export('data.csv');
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];
        return response()->download(public_path('data.csv'), 'data.csv', $headers);
    }



    public function test(){
        return view('extention.index');
    }
}
