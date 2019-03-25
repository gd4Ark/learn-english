<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController{

    protected $req;

    public function __construct(Request $request){
        $this->req = $request;
    }

    public function json($data = [], $status = true, $msg = '', $statusCode = 200){
        return response()->json([
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ])->setStatusCode($statusCode);
    }

    public function msg($msg){
        return $this->json([], true, $msg);
    }

    public function error($msg, $statusCode = 500){
        return $this->json([], true, $msg, $statusCode);
    }


    protected function search($data){
        if ($this->req->has('where')){
            $where = [];
            foreach ($this->req->get('where') as $value){
                $value = json_decode($value);
                if ($value[0] === 'sort'){
                    $data = $data->orderBy($value[2],'DESC');
                }else{
                    $where[] = $value;
                }
            }
            $data =  $data->where($where);
        }
        return $data;
    }

    protected function paginate($query){
        $per = (int)$this->req->get('per_page') ?: 15;
        return $this->json($query->paginate($per));
    }

    protected function sortRank($data){
        $position = 0;
        foreach($data as $key=>$value){
            $time = $data[$key]['time'];
            $data[$key]['time'] = timeFormat($time);
            if ($key === 0){
                $data[$key]['position'] = ++$position;
            }else{
                $before = $data[$key - 1];
                if ($before['time'] === $data[$key]['time']){
                    $data[$key]['position'] = $position;
                }else{
                    $data[$key]['position'] = ++$position;
                }
            }
            $data[$key]['position'] = numberFormat($data[$key]['position']);
        }
        return $data;
    }
}
