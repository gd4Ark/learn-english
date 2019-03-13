<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller{

    public function index(Request $request){
        $list = Feedback::query();
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }

    public function create(Request $request){
        $data =  Feedback::create($request->all());
        return $data->id;
    }

    public function delete(Request $request){
        $ids = $request->get('ids',array());
        Feedback::destroy($ids);
    }

}