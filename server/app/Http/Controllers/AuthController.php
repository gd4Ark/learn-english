<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    public function login(Request $request){
        $name = $request->get('username');
        $pass = $request->get('password');
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
            return $this->respondWithToken($token,$user->id);
        }
    }

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

    public function logout(){
        Auth::invalidate(true);
    }

    public function checkLogin(Request $request){
        return;
    }

    protected function respondWithToken($token,$id){
        return $this->response([
            'user_id' => strval($id),
            'token' => $token,
            'expires_in' => strval(time() + 86400),
        ]);
    }

    protected function getEncrypt($username,$password){
        $salt = env('PASS_SALT',null);
        if (!$salt){
            return $this->response('PASS_SALT 丢失！',500);
        }
        return md5($username.$password.$salt);
    }

}