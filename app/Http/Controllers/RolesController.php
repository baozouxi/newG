<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'regex:/^[\x7f-\xff]+$/',
                'required',
                'string',
                'max:255'
            ],
        ], [
            'name.regex' => '用户组名称必须为中文',
            'name.required' => '请填写名称',
            'name.max' => '最多255个字符'
        ]);


        //这需要进行事务   创建角色 和权限节点的关联
        if (Role::create($request->all())) {
            return code('0', route('roles.index'));
        }
        return code('1', '添加失败，请稍后重试');
    }
}
