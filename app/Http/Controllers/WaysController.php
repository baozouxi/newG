<?php

namespace App\Http\Controllers;

use App\Models\Ways;
use Illuminate\Http\Request;

class WaysController extends Controller
{
    public function index()
    {
        $ways = Ways::orderBy('sort', 'desc')->get();

        return view('way.index', compact('ways'));
    }

    public function create()
    {
        return view('way.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ], [
            'name.required' => '请输入名称'
        ]);

        $request['hospital_id'] = session('hospital.id');

        if (Ways::create($request->all())) {
            return code('-4', '添加成功');
        }

        return code('1', '添加失败，请稍后重试');
    }


}
