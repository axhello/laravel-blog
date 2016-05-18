<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }

    public function login(Request $request)
    {
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $request->merge([$field => $request->input('login')]);
        $login = \Auth::attempt($request->only($field, 'password'));
        if ($login) {
            return \Response::json([
               'access' => 'true'
            ]);
        }
        return \Response::json([
            'error' => '请输入正确的登录信息'
        ]);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

    public function skin()
    {
        return view('admin.dashboard.skin');
    }


}
