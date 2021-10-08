<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sensor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles=Auth::user()->roles;
        switch($roles){
            case '1' ://admin
                return $this->dashboardAdmin();
                break;
            default:
                return $this->indexUser();
        }
    }
    protected function dashboardAdmin(){
        $user= User::get();
        return view('pages.admin.dashboard',compact('user'));
    }
    protected function indexUser(){
        $sensor= sensor::where('user_id','=',Auth::user()->id)->orderByDesc('id')->limit(5)->get();

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
    }

}
