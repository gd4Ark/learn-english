<?php
namespace App\Http\Controllers;
use App\Http\Requests\WordCreateRequest;
use App\Http\Requests\WordUpdateRequest;
use App\Models\Book;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WordController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('auth:api', [
            'except' => ['index', 'show']
        ]);
    }

    public function index(Request $request)
    {
        $query = $this->queryFilter(Word::query());
        return $this->paginateToJson($query);
    }


    public function show(Request $request, $id)
    {
        $item = Book::query()->findOrFail($id);
        return json($item);
    }

    public function create(WordCreateRequest $request)
    {
        $word_list = $this->formatWordList($request->get('word_list'));
        Log::info('----------' . $word_list);
//        try {
//            $input = $request->all();
//            $item = Word::query()->create($input);
//            return json($item->id);
//        } catch (\Exception $e) {
//            return error($e->getMessage());
//        }
    }

    /**
     * @param string $word_list
     * @return array
     */
    private function formatWordList(string $word_list){
        $res = split(removeBlank($word_list));
        $res = array_map(function($item){
            $item = split($item,':');
            if ($item[0] && $item[1]){
                return [
                    'english' => $item[0],
                    'chinese' => $item[1],
                ];
            }else{
                return [];
            }
        },$res);
        $res = array_filter($res,function($item){
            return count($item);
        });
        return $res;
    }

    public function update(WordUpdateRequest $request, $id)
    {
        $item = Word::query()->findOrFail($id);
        try {
            $input = $request->all();
            $item->update($input);
            return json($item);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }
    }
    public function delete($id)
    {
        $item = Word::query()->findOrFail($id);
        try {
            $item->delete();
            return json();
        } catch (\Exception $e) {
            return error('删除失败');
        }
    }
    public function deleteBatch(Request $request)
    {
        $ids = (array)$request->get('ids');
        try {
            Word::query()->whereIn('id', $ids)->delete();
            return json();
        } catch (\Exception $e) {
            return error('删除失败');
        }
    }
}