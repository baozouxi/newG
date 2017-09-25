<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointRequest extends FormRequest
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
            'name'       => [
                'regex:/^[\x7f-\xff]+$/',
                'required',
                'string',
                'max:255'
            ],
            'phone'      => [
                'required',
                'min:11',
                'string',
                'unique:appointments',
                'regex:/^1\d{1}\d{1}\d{8}/'
            ],
            'gender'     => 'required|in:1,2',
            'age'        => 'required|max:150|integer|min:0',
            'doctor_id'  => 'nullable|integer|min:0',
            'illness_id' => 'required|integer|min:1',
            'way_id'     => 'required|integer',
            'province'   => 'required|integer|min:1',
            'city'       => 'required|integer|min:1',
            'town'       => 'required|integer|min:1',
            'address'    => 'nullable|string',
            'book_date'  => 'required|date_format:Y-m-d H:i|after_or_equal:today',
            'content'    => 'required|string|min:6',
            'chatlog'    => 'string|nullable',
            'qq'         => 'nullable|string|size:13',
            'job'        => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.regex'      => '名称必须是中文',
            'name.required'   => '请输入名称',
            'name.max'        => '最多输入255个字符',
            'phone.required'  => '请输入电话',
            'phone.unique'    => '电话已经存在，请查看是否已经存在病人',
            'phone.min'       => '电话格式错误，请检查',
            'phone.regex'     => '电话格式错误，请检查',
            'age.required'    => '请输入年龄',
            'gender.required' => '请输入性别',
            'illness_id.required' => '请选择病种',
            'way_id.required' => '请选择预约途径',
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
