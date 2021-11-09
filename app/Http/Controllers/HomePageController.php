<?php

namespace App\Http\Controllers;

use App\{Projectlistpersonalmodel, Statuslistmodel};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        // ALL
        $count = Projectlistpersonalmodel::count(); //總數
        $y_count = Projectlistpersonalmodel::leftjoin('statuslistmodels','projectlistpersonalmodels.status_id','=','statuslistmodels.id')->select('projectlistpersonalmodels.*','statuslistmodels.statusname')->where('statusname','=','已確認')->count();
        $n_count = Projectlistpersonalmodel::leftjoin('statuslistmodels','projectlistpersonalmodels.status_id','=','statuslistmodels.id')->select('projectlistpersonalmodels.*','statuslistmodels.statusname')->where('statusname','=','未確認')->count();

        // 個人
        $username = Auth::user()->username;
        $per_count = Projectlistpersonalmodel::where('username','=',$username)->count(); //個人總數
        $per_y_count = Projectlistpersonalmodel::leftjoin('statuslistmodels','projectlistpersonalmodels.status_id','=','statuslistmodels.id')->select('projectlistpersonalmodels.*','statuslistmodels.statusname')->where('username','=',$username)->where('statusname','=','已確認')->count();
        $per_n_count = Projectlistpersonalmodel::leftjoin('statuslistmodels','projectlistpersonalmodels.status_id','=','statuslistmodels.id')->select('projectlistpersonalmodels.*','statuslistmodels.statusname')->where('username','=',$username)->where('statusname','=','未確認')->count();

        return view('.site.system.all.homepage',compact('count','y_count','n_count','per_count','per_y_count','per_n_count'));
    }
}
