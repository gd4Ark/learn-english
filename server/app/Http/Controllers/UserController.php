<?php

namespace App\Http\Controllers;

use App\Book;
use App\English;

use App\Score;
use DemeterChain\B;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function getBook(Request $request){
        $list = Book::withCount('english');
//        // 只拿一个
        if ($request->has('id')){
            return $list->find($request->input('id'));
        }
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }

    public function getEnglish(Request $request){
        if (!$request->has('book_id')){
            return $this->responseErr('获取单词列表失败',403);
        }
        $book_id = $request->input('book_id');
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

    public function submit(Request $request){
        $all = $request->all();
        $data = Score::where([
            'book_id' => $all['book_id'],
            'module' => $all['module'],
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