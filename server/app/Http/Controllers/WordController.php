<?php

namespace App\Http\Controllers;

use App\Http\Requests\Word\WordGetRequest;
use App\Http\Requests\Word\WordCreateRequest;
use App\Http\Requests\Word\WordUpdateRequest;
use App\Models\Book;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('auth:api', [
            'except' => ['index', 'show']
        ]);
    }

    public function index(WordGetRequest $request)
    {
        $book_id = $request->get('book_id');
        $query = Word::query()->where('book_id',$book_id);
        $query = $this->queryFilter($query);
        return $this->paginateToJson($query);
    }


    public function show($id)
    {
        $item = Book::query()->findOrFail($id);
        return $this->success($item);
    }

    public function create(WordCreateRequest $request)
    {
        $new_count = 0;
        $word_list = $request->get('word_list');
        $book_id = $request->get('book_id');
        try {
            foreach ($word_list as $word){
                $word = array_merge([
                    'book_id' => $book_id,
                ],$word);
                $item = Word::query()->firstOrCreate($word);
                if ($item->wasRecentlyCreated){
                    $new_count++;
                }
            }
            return $this->success([
                'new_count' =>  $new_count,
                'fail_count' => count($word_list) - $new_count,
            ]);
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }

    public function update(WordUpdateRequest $request, $id)
    {
        $item = Word::query()->findOrFail($id);
        try {
            $input = $request->all();
            $item->update($input);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }
    public function delete($id)
    {
        $item = Word::query()->findOrFail($id);
        try {
            $item->delete();
            return $this->success();
        } catch (\Exception $e) {
            return $this->failed('删除失败');
        }
    }
    public function deleteBatch(Request $request)
    {
        $ids = (array)$request->get('ids');
        try {
            Word::query()->whereIn('id', $ids)->delete();
            return $this->success();
        } catch (\Exception $e) {
            return $this->failed('删除失败');
        }
    }
}