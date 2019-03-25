<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller{

    public function index(Request $request){
        if ($request->has('all')){
            $query = Log::query()->orderBy('version','DESC')->get();
            return $this->json( [
                'data' => $query,
                'total' => $query->count(),
            ]);
        };
        $query = $this->search(Log::query()->orderBy('version','DESC'));
        return $this->paginate($query);
    }

    public function show($id){
        $item = Log::query()->findOrFail($id);
        return $this->json($item);
    }

    public function create(Request $request){
        try {
            $input = $request->all();
            // Todo: Validate
            $item = Log::query()->create($input);
            return $this->json($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(Request $request,$id){
        $item = Log::query()->findOrFail($id);
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
            Log::query()->whereIn('id', $ids)->delete();
            return $this->json();
        } catch (\Exception $e) {
            return $this->error('删除失败！');
        }
    }

}