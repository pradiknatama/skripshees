<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class akunControl extends Controller
{
    public function index()
    {   
        $user= User::where('id','=',Auth::user()->id)->first();
        return view('pages.akun',compact('user'));
    }
    public function update(Request $request, $id){
        $data=$request->all();
        
        
        $user= User::where('id','=',Auth::user()->id)->first();
        if ($request->current_password) {
            // dd('aaa');
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required','min:8'],
                'new_confirm_password' => ['same:new_password'],
            ],
            [   'new_password.required' => 'Password Baru Tidak Boleh Kosong',
                'new_password.min' => 'Password Minimal 8 karakter ',
                'new_confirm_password.same'=>'Konfirmasi Password baru harus sesuai'
            ]);
        }
        else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
        }
        // dd($data);
        $user->update($data);
        $user['name']   = $request->input('name');
        $user['password'] = Hash::make($request->new_password);        
        // dd($user);
        $user->update();
        
   
        // $p=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        // dd($p);
        return redirect()->route('edit_akun')->with('success', 'Ubah Akun Berhasil.');;
    }
}
