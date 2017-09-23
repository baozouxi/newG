<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => [
                'regex:/^[\x7f-\xff]+$/',
                'required',
                'string',
                'max:255'
            ],
            'phone'       => 'required|min:11|string|unique:patients',
            'gender'      => 'required|in:1,2',
            'age'         => 'required|max:150|integer|min:0',
            'medical_num' => 'required|string|unique:patients',
            'doctor_id'   => 'required|integer|min:1',
            'illness_id'  => 'required|integer|min:1',
            'ad_id'       => 'nullable|integer',
            'province'    => 'required|integer|min:1',
            'city'        => 'required|integer|min:1',
            'town'        => 'required|integer|min:1',
            'content'     => 'required|string|min:6',
        ];
    }


    public function messages()
    {
        return [
            'name.regex'           => '名称必须是中文',
            'name.required'        => '请输入名称',
            'name.max'             => '最多输入255个字符',
            'phone.required'       => '请输入电话号码',
            'phone.unique'         => '电话号码已存在,请检查是否存在相同病人',
            'gender.required'      => '请选择性别',
            'age.max'              => '年龄最大150岁',
            'medical_num.required' => '请输入病历号',
            'medical_num.unique'   => '病历号已存在，请刷新本页面并重试',
            'doctor_id.required'   => '请选择医生',
            'illness_id.required'  => '请选择病种',
            'province.required'    => '请选择省份',
            'province.min'         => '请选择省份',
            'city.required'        => '请选择城市',
            'city.min'             => '请选择城市',
            'town.min'             => '请选择区域',
            'town.required'        => '请选择区域',
            'content.required'     => '请填写备注',
            'content.min'          => '备注最少填写6个字符'
        ];
    }

}
