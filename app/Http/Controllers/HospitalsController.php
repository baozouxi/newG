<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalsController extends Controller
{

    public function index()
    {
        $hospitals = Hospital::all();

        return view('hospital.index', compact('hospitals'));
    }

    public function create()
    {
        return view('hospital.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'regex:/^[\x7f-\xff]+$/',
                'required',
                'string',
                'max:255',
                'unique:hospitals'
            ]
        ], [
            'name.regex'    => '医院名称必须是中文',
            'name.required' => '请输入医院名称',
            'name.unique'   => '医院已存在，请检查后重试'
        ]);

        if (Hospital::create($request->all())) {
            return code('-4', '添加成功');
        }

        return code('1', '添加失败，请稍后重试');

    }


    public function destroy(Hospital $hospital)
    {
        if ($hospital->delete()) {
            return code('1', '删除成功');
        }

        return code('2', '删除失败');
    }


    public function update(Request $request, Hospital $hospital)
    {
        $this->validate($request, [
            'name'   => [
                'regex:/^[\x7f-\xff]+$/',
                'nullable',
                'string',
                'max:255',
                'unique:hospitals'
            ],
            'active' => 'in:0,1|nullable|integer',
            'sort'   => 'integer|nullable'

        ]);

        if($hospital->update($request->all())){
            return code('0', '成功');
        }


        return code('1', '失败');

    }
}
