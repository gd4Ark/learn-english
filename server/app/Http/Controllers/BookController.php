<?php
namespace App\Http\Controllers;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('auth:api', [
            'except' => ['index', 'show','update']
        ]);
    }

    public function index(Request $request)
    {
        $query = $this->getRelationCount(Book::query());
        $query = $this->queryFilter($query);
        if ($request->get('getOptions') == 1) {
            return $this->getOptions($query);
        } else {
            return $this->paginateToJson($query);
        }
    }

    private function getRelationCount($query){
        return $query->withCount([
            'words',
        ]);
    }


    public function show(Request $request, $id)
    {
        $item = Book::query()->findOrFail($id);
        return json($item);
    }

    public function create(BookCreateRequest $request)
    {
        try {
            $input = $request->all();
            $item = Book::query()->create($input);
            return json($item->id);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }
    }
    public function update(BookUpdateRequest $request, $id)
    {
        $item = Book::query()->findOrFail($id);
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
        $item = Book::query()->findOrFail($id);
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
            Book::query()->whereIn('id', $ids)->delete();
            return json();
        } catch (\Exception $e) {
            return error('删除失败');
        }
    }
}