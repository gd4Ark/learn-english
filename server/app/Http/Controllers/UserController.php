<?php

namespace App\Http\Controllers;

use App\Book;
use App\English;

use App\Feedback;
use App\Log;
use App\Score;
use App\Setting;
use DemeterChain\B;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function getBook(Request $request){
        $list = Book::withCount('english');
//        // 只拿一个
        if ($request->has('id')){
            return $list->find($request->input('id'));
        }
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }

    public function getEnglish(Request $request){
        if (!$request->has('book_id')){
            return $this->responseErr('获取单词列表失败',403);
        }
        $book_id = $request->input('book_id');
        $list = English::where('book_id',$book_id);
        // 复习拿全部
        if ($request->has('review')){
            return [
                'list' => $list->get(['chinese','english']),
                'total' => $list->count(),
            ];
        };
        // 正常搜索分页
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }

    public function submit(Request $request){
        $all = $request->all();
        $data = Score::where([
            'book_id' => $all['book_id'],
            'review_module' => $all['review_module'],
            'username' => $all['username'],
        ])->first();
        if (!$data){
            Score::create($request->all());
            return;
        }
        if ($all['time'] < $data->time){
            $data->time = $all['time'];
            $data->save();
            return;
        }
    }

    public function getRank(Request $request){
        $setting = $this->getSetting();
        $data = Score::where([
                'book_id' => $request->input('book_id'),
                'review_module' => $request->input('review_module'),
            ])
            ->orderBy('time')
            ->orderBy('updated_at','DESC')
            ->limit($setting->rank_limit_quantity)
            ->get(['id','username','time']);
        foreach($data as $key=>$value){
            $data[$key]['position'] = $key + 1;
        }
        return [
            'list' => $this->sortRank($data),
        ];
    }

    public function getSetting(){
        return Setting::all()->first();
    }

    public function addFeedback(Request $request){
        Feedback::create($request->all());
    }

    //获取日志
    public function getLog(Request $request){
        // 拿全部
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
}