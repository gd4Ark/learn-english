<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $default_page_size = 30;
    private $default_page_index = 1;

    public function response($data = []){
        return response()->json(['data' => $data],200);
    }

    public function responseErr($message = '',$status = 500){
        return response()->json(['message' => $message],$status);
    }

    public function search($request,$list){
        $has_keyword = $request->has('keyword');
        if ($has_keyword){
            $keyword = [];
            foreach ($request->input('keyword') as $value){
                $value = json_decode($value);
                if ($value[0] === 'sort'){

                    $list = $list->orderBy($value[2],'DESC');

                }else{
                    $keyword[] = $value;
                }
            }
            $list =  $list->where($keyword);
        }
        return $list;
    }

    public function pagination($request,$list,$total=null){
        if ($total === null){
            $total = $list->count();
        }
        $pageSize = $request->input('pageSize',$this->default_page_size);
        $pageIndex = $request->input('pageIndex',$this->default_page_index);
        $offset = $pageSize * ($pageIndex-1);
        $list = $list
            ->offset($offset)
            ->limit($pageSize);
        return [
            'list' => $list->get(),
            'total' => $total,
        ];
    }

    public function numberFormat($num){
        return $num > 9 ? $num : '0' . $num;
    }

    public function timeFormat($time){
        $m = floor($time / 60);
        $s = $time % 60;
        return $this->numberFormat($m) . ':' . $this->numberFormat($s);
    }

    public function sortRank($data){
        $position = 0;
        foreach($data as $key=>$value){
            $time = $data[$key]['time'];
            $data[$key]['time'] = $this->timeFormat($time);
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
            $data[$key]['position'] = $this->numberFormat($data[$key]['position']);
        }
        return $data;
    }
}
