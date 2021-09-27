<?php

namespace App\Http\Controllers;
// use App\Models\jarak;
use App\Models\sensor;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Http\Request;

class sensorControl extends Controller
{
    public function index(){
        // $jarak= jarak::orderByDesc('id')->limit(1)->get();
        // $jarak1 = sensor::orderByDesc('id')->limit(5)->get();
        $sensor= sensor::orderByDesc('id')->limit(5)->get();
        // dd($sensor);
        // dd($jarak1);
        // return response()->json($jarak1, 200);
        //ph
        $title_ph[]=['date', 'pH'];
        $res[] = [];
        foreach ($sensor as $key => $val) {
            $res[++$key] = [$val->created_at->format('d-m-Y h:i:s'), (float)$val->ph];
        };
        array_shift($res);
        array_multisort($res);
        $ph=array_merge($title_ph,$res);

        //suhu
        $title_suhu[]=['date', 'Suhu'];
        $resSuhu[] = [];
        foreach ($sensor as $key => $val) {
            $resSuhu[++$key] = [$val->created_at->format('d M Y h:i:s'), (float)$val->suhu];
        };
        array_shift($resSuhu);
        array_multisort($resSuhu);
        $suhu=array_merge($title_suhu,$resSuhu);

        //kekeruhan
        $title_kekeruhan[]=['date','Kekeruhan'];
        $resKekeruhan[] = [];
        foreach ($sensor as $key => $val) {
            $resKekeruhan[++$key] = [$val->created_at->format('d M Y h:i:s'), (float)$val->kekeruhan];
        };
        array_shift($resKekeruhan);
        array_multisort($resKekeruhan);
        $kekeruhan=array_merge($title_kekeruhan,$resKekeruhan);

        //tinggi air
        $title_tinggi[]=['date', 'Tinggi Air'];
        $resTinggi[] = [];
        foreach ($sensor as $key => $val) {
            $resTinggi[++$key] = [$val->created_at->format('d M Y h:i:s'), (float)$val->tinggi];
        };
        array_shift($resTinggi);
        array_multisort($resTinggi);
        $tinggi=array_merge($title_tinggi,$resTinggi);

        return view('pages.dashboard')
                ->with('sensor_tinggi',json_encode($tinggi))
                ->with('sensor_kekeruhan',json_encode($kekeruhan))
                ->with('sensor_suhu',json_encode($suhu))
                ->with('sensor_ph',json_encode($ph));
        // return view('pages.dashboard',compact('jarak1'));
    }
    public function store(Request $request)
    {
        $sensor=new sensor();
        $sensor->tinggi=$request->tinggi;
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
        $tinggi =DB::table('sensor')->orderByDesc('id')->limit(1)->pluck('tinggi');
       return response()->json($tinggi, 200);
    }
}
