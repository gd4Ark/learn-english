<?php

namespace App\Http\Controllers;

use App\Book;
use App\English;
use Illuminate\Http\Request;

class BookController extends Controller{

    public function index(Request $request){
        $list = Book::withCount('english');
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }

    public function show($id){
        return Book::findOrFail($id);
    }


    public function create(Request $request){
        $data = Book::create($request->all());
        return $data->id;
    }

    public function update(Request $request,$id){
        $data = Book::findOrFail($id);
        $data->update($request->all());
        return $data->id;
    }

    public function delete(Request $request){
        $ids = $request->get('ids',array());
        foreach ($ids as $id){
            /*
            * 检查是否存在单词
            * */
            $data = English::where('book_id',$id)->first();
            if ($data){
                return $this->responseErr('存在单词，无法删除！',403);
            }
        }
        Book::destroy($ids);
    }

}