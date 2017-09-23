<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'     => [
                'regex:/^[\x7f-\xff]+$/',
                'required',
                'string',
                'max:255'
            ],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'active'   => 'nullable|in:0',
            'qq'       => 'nullable|max:15|string',
            'weixin'   => 'nullable|string',
            'phone'    => 'required|min:11|string',
            'hids'     => 'required|array',
            'roles'    => 'required|array',
            'group_id' => 'required|integer|min:1'

        ];
    }

    public function messages()
    {
        return [
            'name.required'      => '请输入名称',
            'name.regex'         => '名称必须为汉字',
            'name.max'           => '名称最多255个字符',
            'email.required'     => '请输入正确的邮箱地址',
            'email.unique'       => '邮箱已存在，请检查用户是否存在',
            'qq.max'             => 'QQ格式不正确',
            'phone.required'     => '请输入正确的手机号码',
            'phone.min'          => '请输入正确的手机号码',
            'hids.required'      => '请选择用户所属医院，可以多选',
            'roles.required'     => '请选择用户权限，可以多选',
            'group.required'     => '请选择用户在的组',
            'password.required'  => '请输入密码',
            'password.min'       => '密码最少6位',
            'password.confirmed' => '两次输入的密码不一致'


        ];
    }

}
