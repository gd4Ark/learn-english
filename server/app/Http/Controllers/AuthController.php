<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    public function login(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        $password = $this->getEncrypt($username,$password);
        try {
            $where = [['username', $username],['password', $password]];
            if ($user = Admin::query()->where($where)->first()) {
                $token = Auth::login($user);
                return $this->respondWithToken($token);
            }
            return $this->error('用户名或密码错误！',403);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function updatePassword(Request $request){
        $user = Auth::user();
        $username = $user->username;
        $old_password = $this->getEncrypt($username,$request->get('old_password'));
        try{
            if ($user->password === $old_password){
                $user->password = $this->getEncrypt($username,$request->get('new_password'));;
                if ($user->save()){
                    return $this->msg('修改成功！');
                }
                return $this->error('修改失败！',403);
            }
            return $this->error('旧密码错误！',403);
        }catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function logout(){
        Auth::logout();
        return $this->msg('成功登出！');
    }

    public function checkLogin(){
        return $this->msg('Token 有效！');
    }

    public function refresh(){
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token){
        return $this->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ]);
    }

    protected function getEncrypt($username,$password){
        $salt = env('PASS_SALT',null);
        if (!$salt){
            return $this->error('PASS_SALT 丢失！');
        }
        return md5($username.$password.$salt);
    }

}