<?php

namespace App\Http\Controllers;

use App\Book;
use App\English;
use App\Admin;
use App\Feedback;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{

    protected $user_upload_path = '/users/';

    // 登录
    public function login(Request $request){
        $name = $request->input('username');
        $pass = $request->input('password');
        $pass = $this->getEncrypt($name,$pass);
        $user = Admin::where([
            ['username','=',$name],
            ['password','=',$pass],
        ])->first();
        if (!$user){
            return $this->responseErr('登录失败！',401);
        }
        if (!$token = Auth::login($user)) {
            return $this->responseErr('登录失败！',401);
        } else {
            $result = [];
            $result['user_id'] = strval($user->id);
            $result['token'] = $token;
            $result['expires_in'] = strval(time() + 86400);
            return $this->response($result);
        }
    }

    public function checkLogin(Request $request){
        return;
    }

    public function logout(){
        Auth::invalidate(true);
    }

    // 更新密码
    public function updatePassword(Request $request){
        $admin = Auth::user();
        $username = $admin->username;
        $old_pass = $this->getEncrypt($username,$request->input('old_pass'));
        if ($admin->password === $old_pass){
            $admin->password = $this->getEncrypt($username,$request->input('new_pass'));;
            if ($admin->save()){
                return;
            }
            return $this->responseErr('修改失败！',403);
        }
        return $this->responseErr('旧密码错误！',403);
    }

    // 更新设置
    public function updateSetting(Request $request){
        $data = Setting::all()->first();
        $data->update($request->all());
    }

    // 添加
    public function addBook(Request $request){
        $data = Book::create($request->all());
        return $data->id;
    }

    // 更新
    public function updateBook(Request $request){
        if (!$request->has('id')){
            return false;
        }
        $data = Book::find($request->input('id'));
        $data->update($request->all());
        return $data->id;
    }

    // 删除
    public function delBook(Request $request){
        $ids = $request->input('ids',array());
        foreach ($ids as $id){
            /*
            * 检查是否存在单词
            * */
            $data = English::where('book_id',$id)->first();
            if ($data){
                return $this->responseErr('存在单词，无法删除！',403);
            }
        }
        Book::destroy($ids);
    }

    // 添加
    public function addEnglish(Request $request){
        $data = English::create($request->all());
        return $data->id;
    }

    // 更新
    public function updateEnglish(Request $request){
        if (!$request->has('id')){
            return false;
        }
        $data = English::find($request->input('id'));
        $data->update($request->all());
        return $data->id;
    }

    // 删除
    public function delEnglish(Request $request){
        $ids = $request->input('ids',array());
        English::destroy($ids);
    }

    //获取反馈
    public function getFeedback(Request $request){
        $list = Feedback::query();
        $list = $this->search($request,$list);
        return $this->pagination($request,$list);
    }

    // 删除
    public function delFeedback(Request $request){
        $ids = $request->input('ids',array());
        Feedback::destroy($ids);
    }

    // 加密秘钥
    private function getEncrypt($username,$password){
        $salt = env('PASS_SALT',null);
        if (!$salt){
            return $this->response('PASS_SALT 丢失！',500);
        }
        return md5($username.$password.$salt);
    }

}