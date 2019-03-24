<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller{

    public function index(Request $request){
        $query = $this->search(Feedback::query());
        return $this->paginate($query);
    }

    public function show($id){
        $item = Feedback::query()->findOrFail($id);
        return $this->json($item);
    }

    public function create(Request $request){
        try {
            $input = $request->all();
            // Todo: Validate
            $item = Feedback::query()->create($input);
            return $this->json($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete(Request $request){
        $ids = (array)$request->get('ids');
        try {
            Feedback::query()->whereIn('id', $ids)->delete();
            return $this->json();
        } catch (\Exception $e) {
            return $this->error('删除失败！');
        }
    }

}