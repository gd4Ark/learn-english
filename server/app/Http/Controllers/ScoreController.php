<?php

namespace App\Http\Controllers;

use App\Score;
use App\Setting;
use Illuminate\Http\Request;

class ScoreController extends Controller{

    public function index(Request $request){
        $setting = Setting::query()->first();
        $data = Score::query()->where([
            'book_id' => $request->get('book_id'),
            'review_module' => $request->get('review_module'),
        ])
            ->orderBy('time')
            ->orderBy('updated_at','DESC')
            ->limit($setting->rank_limit_quantity)
            ->get(['id','username','time']);
        foreach($data as $key=>$value){
            $data[$key]['position'] = $key + 1;
        }
        return $this->json($this->sortRank($data));
    }

    public function create(Request $request){
        try{
            $input = $request->all();
            $item = Score::query()->where([
                'book_id' => $input['book_id'],
                'review_module' => $input['review_module'],
                'username' => $input['username'],
            ])->first();
            if (!$item){
                $item = Score::query()->create($input);
            }
            else if ($input['time'] < $item->time){
                $item->time = $input['time'];
                $item->save();
            }
            return $this->json($item);
        }catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}