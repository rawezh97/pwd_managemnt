<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserModiffyController extends Controller
{
    public function User_uodate(Request $request ,$id){
        if (Auth::id() == $id ) {
            $user = User::find($id);
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
    
            $user->save();
    
            return redirect('/main')->with('msg' , 'Updated');

        }
        return redirect()->back()->with('msg','Successfuly failed');
    }
}
