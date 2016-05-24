<?php

namespace App\Http\Controllers\Admin;

use App\Models\Options;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OptionsController extends Controller
{
    public function basic()
    {
        $options = Options::first();
        return view('admin.options.basic', compact('options'));
    }

    public function create(Request $request)
    {
        $options = Options::create($request->all());
        if ($options) {
            return redirect()->back()->with('success', '站点信息更新成功!');
        } else {
            return redirect()->back()->with('error', '站点信息更新失败!');
        }
    }

    public function update(Request $request, $id)
    {
        $options = Options::findOrFail($id);
        $options->update($request->all());
        if ($options->save()) {
            return redirect()->back()->with('success', '站点信息更新成功!');
        } else {
            return redirect()->back()->with('error', '站点信息更新失败!');
        }
    }

    public function addUser()
    {
        return view('admin.options.addUser');
    }

    public function editUser()
    {
        $user = \Auth::user();
        $options = Options::first();
        return view('admin.options.editUser', compact('user', 'options'));
    }

    public function updateUser(Requests\UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $old_pass = $request->old_password;
        $user_pass = $user->password;
        if (\Hash::check($old_pass, $user_pass)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->new_password;
            $user->save();
            if ($user->save()) {
                return back()->with('success', '用户信息更新成功!');
            } else {
                return redirect()->back()->with('error', '用户信息更新失败!');
            }
        } else {
            return redirect()->back()->with('error', '原密码不正确!');
        }
    }
}
