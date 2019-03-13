<?php

namespace App\Http\Controllers;

use App\Score;
use App\Setting;
use Illuminate\Http\Request;

class ScoreController extends Controller{

    public function index(Request $request){
        $setting = Setting::query()->first();
        $data = Score::where([
            'book_id' => $request->input('book_id'),
            'review_module' => $request->input('review_module'),
        ])
            ->orderBy('time')
            ->orderBy('updated_at','DESC')
            ->limit($setting->rank_limit_quantity)
            ->get(['id','username','time']);
        foreach($data as $key=>$value){
            $data[$key]['position'] = $key + 1;
        }
        return [
            'list' => sortRank($data),
        ];
    }

    public function create(Request $request){
        $all = $request->all();
        $data = Score::where([
            'book_id' => $all['book_id'],
            'review_module' => $all['review_module'],
            'username' => $all['username'],
        ])->first();
        if (!$data){
            Score::create($request->all());
            return;
        }
        if ($all['time'] < $data->time){
            $data->time = $all['time'];
            $data->save();
            return;
        }
    }

}