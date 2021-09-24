<?php

namespace App\Http\Controllers;
use App\Models\jarak;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Http\Request;

class sensorControl extends Controller
{
    public function index(){
        // $jarak= jarak::orderByDesc('id')->limit(1)->get();
        $jarak1 = jarak::orderByDesc('id')->limit(5)->get();
        // dd($jarak1);
        // return response()->json($jarak1, 200);
        $res[] = ['date', 'Jarak'];
        foreach ($jarak1 as $key => $val) {
            $res[++$key] = [$val->created_at->format('d M Y h:i:s'), (int)$val->Jarak];
        };
        // array_multisort($res);
        // dd($res);
        return view('pages.dashboard')
                ->with('jarak1',json_encode($res));
        // return view('pages.dashboard',compact('jarak1'));
    }
    public function store(Request $request)
    {
        dd($request);
        $jarak=new jarak();
        $jarak->Jarak=$request->Jarak;
        $jarak->save();
        dd($jarak);
        return $jarak;
    }

    public function nilai_sensor()
    {
        $jarak =DB::table('jarak')->orderByDesc('id')->limit(1)->pluck('Jarak');
       return response()->json($jarak, 200);
    }
}
