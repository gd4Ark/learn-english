<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param AdminLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AdminLoginRequest $request)
    {
        try {
            if ($user = Admin::query()->where('username', $request->get('username'))->first()) {
                if (password_verify($request->get('password'), $user['password'])) {
                    $token = Auth::login($user);
                    return $this->respondWithToken($token);
                }
            }
            return error('无效用户名或密码');
        } catch (\Exception $e) {
            return error($e->getMessage());
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function logout()
    {
        Auth::logout();
        return msg('成功登出');
    }

    /**
     * @param AdminResetPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(AdminResetPasswordRequest $request)
    {
        try {
            /**
             * @var $user Admin
             */
            $user = Auth::user();
            if (!password_verify($request->get('password_current'), $user['password'])) {
                throw new \Exception('Current password wrong');
            }
            if ($request->get('password') !== $request->get('password_confirm')) {
                throw new \Exception('Password & confirm are not equal');
            }
            $user['password'] = password_hash($request->get('password'), PASSWORD_DEFAULT);
            $user->save();
            return msg('重置成功');
        } catch (\Exception $e) {
            return error($e->getMessage());
        }
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
