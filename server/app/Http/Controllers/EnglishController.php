<?php

namespace App\Http\Controllers;

use App\English;
use Illuminate\Http\Request;

class EnglishController extends Controller{

    public function index(Request $request){
        if (!$request->has('book_id')){
            return $this->responseErr('获取单词列表失败',403);
        }
        $book_id = $request->get('book_id');
        $list = English::where('book_id',$book_id);
        // 复习拿全部
        if ($request->has('review')){
            return [
                'list' => $list->get(['chinese','english']),
                'total' => $list->count(),
            ];
        };
        // 正常搜索分页
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }


    public function create(Request $request){
        $data = English::create($request->all());
        return $data->id;
    }

    public function update(Request $request,$id){
        $data = English::findOrFail($id);
        $data->update($request->all());
        return $data->id;
    }

    public function delete(Request $request){
        $ids = $request->get('ids',array());
        English::destroy($ids);
    }

}