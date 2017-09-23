<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use Illuminate\Http\Request;

class IllnessesController extends Controller
{

    public function index()
    {
        $illnesses = Illness::where('hospital_id', session('hospital.id'))->get();

        return view('illness.index', compact('illnesses'));
    }


    public function create()
    {
        return view('illness.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|string'], ['name.required' => '请输入病种名称']);
        $request['hospital_id'] = session('hospital.id');

        if (Illness::create($request->all())) {
            return code('-4', '添加成功');
        }
            return code('0', '添加失败');


    }


}
