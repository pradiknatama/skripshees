<?php

namespace App\Http\Controllers;
use App\Models\jarak;
use App\Models\sensor;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Http\Request;

class sensorControl extends Controller
{
    public function index(){
        // $jarak= jarak::orderByDesc('id')->limit(1)->get();
        $jarak1 = jarak::orderByDesc('id')->limit(5)->get();
        $sensor= sensor::orderByDesc('id')->limit(1)->get();
        // dd($sensor);
        // dd($jarak1);
        // return response()->json($jarak1, 200);
        $res[] = ['date', 'Jarak'];
        foreach ($jarak1 as $key => $val) {
            $res[++$key] = [$val->created_at->format('d M Y h:i:s'), (int)$val->Jarak];
        };
        // array_multisort($res);
        // dd($res);
        return view('pages.dashboard')
                ->with('sensor')
                ->with('jarak1',json_encode($res));
        // return view('pages.dashboard',compact('jarak1'));
    }
    public function store(Request $request)
    {
        $sensor=new sensor();
        $sensor->jarak=$request->jarak;
        $sensor->ph=$request->ph;
        $sensor->kekeruhan=$request->kekeruhan;
        $sensor->suhu=$request->suhu;
        $sensor->save();
        dd($sensor);
        // $jarak=new jarak();
        // $jarak->Jarak=$request->Jarak;
        // $jarak->save();
        // dd($jarak);
        return $sensor;
    }

    public function fresh_ph()
    {
        $ph =DB::table('sensor')->orderByDesc('id')->limit(1)->pluck('ph');
       return response()->json($ph, 200);
    }
    public function fresh_suhu()
    {
        $suhu =DB::table('sensor')->orderByDesc('id')->limit(1)->pluck('suhu');
       return response()->json($suhu, 200);
    }
    public function fresh_keruh()
    {
        $keruh =DB::table('sensor')->orderByDesc('id')->limit(1)->pluck('kekeruhan');
       return response()->json($keruh, 200);
    }
    public function fresh_tinggi()
    {
        $tinggi =DB::table('sensor')->orderByDesc('id')->limit(1)->pluck('jarak');
       return response()->json($tinggi, 200);
    }
}
