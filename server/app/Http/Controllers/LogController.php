<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller{

    public function index(Request $request){
        if ($request->has('all')){
            $list = Log::orderBy('version','DESC')->get();
            return [
                'list' => $list,
                'total' => $list->count(),
            ];
        };
        $list = Log::orderBy('version','DESC');
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }

    public function create(Request $request){
        $data = Log::create($request->all());
        return $data->id;
    }

    public function update(Request $request,$id){
        $data = Log::findOrFail($id);
        $data->update($request->all());
        return $data->id;
    }

    public function delete(Request $request){
        $ids = $request->get('ids',array());
        Log::destroy($ids);
    }

}