<?php

namespace App\Http\Controllers;

use App\Book;
use App\English;
use Illuminate\Http\Request;

class BookController extends Controller{

    public function index(Request $request){
        $query = $this->search(Book::query()->withCount('english'));
        return $this->paginate($query);
    }

    public function show($id){
        $item = Book::query()->findOrFail($id);
        return $this->json($item);
    }


    public function create(Request $request){
        try {
            $input = $request->all();
            // Todo: Validate
            $item = Book::query()->create($input);
            return $this->json($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(Request $request,$id){
        $item = Book::query()->findOrFail($id);
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
            foreach ($ids as $id){
                /*
                * 检查是否存在单词
                * */
                $data = English::where('book_id',$id)->first();
                if ($data){
                    return $this->error('存在单词，无法删除！',403);
                }
            }
            Book::query()->whereIn('id', $ids)->delete();
        } catch (\Exception $e) {
            return $this->error('Delete failed');
        }
    }

}