<?php

namespace App\Http\Controllers;

use App\English;
use Illuminate\Http\Request;

class EnglishController extends Controller{

    public function index(Request $request){
        if (!$request->has('book_id')){
            return $this->error('获取单词列表失败',403);
        }
        $book_id = $request->get('book_id');
        $query = English::query()->where('book_id',$book_id);
        // 复习拿全部
        if ($request->has('review')){
            return $this->json([
                'data' => $query->get(['chinese','english']),
                'total' => $query->count(),
            ]);
        };
        // 正常搜索分页
        $query = $this->search($query);
        return $this->paginate($query);
    }

    public function show($id){
        $item = English::query()->findOrFail($id);
        return $this->json($item);
    }


    public function create(Request $request){
        try {
            $input = $request->all();
            // Todo: Validate
            $item = English::query()->create($input);
            return $this->json($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(Request $request,$id){
        $item = English::query()->findOrFail($id);
        try {
            $input = $request->all();
            // Todo: Validate
            $item->update($input);
            return $this->json($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete(Request $request){
        $ids = (array)$request->get('ids');
        try {
            English::query()->whereIn('id', $ids)->delete();
            return $this->json();
        } catch (\Exception $e) {
            return $this->error('删除失败！');
        }
    }

}