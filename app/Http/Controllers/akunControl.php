<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class akunControl extends Controller
{
    public function index()
    {   
        $user= User::where('id','=',Auth::user()->id)->first();
        return view('pages.akun',compact('user'));
    }
    public function update(userRequest $request){
        $user= User::where('id','=',Auth::user()->id)->first();
        
        $user['name']   = $request->input('name');
        // $user['password'] = $request->input('password');        

        $user->update();

        return redirect()->route('edit_akun');
    }
}
