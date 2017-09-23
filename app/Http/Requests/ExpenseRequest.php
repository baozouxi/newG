<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'doctor_id'      => 'required|integer',
            'patient_id'     => 'required|integer|exists:patients,id',
            'dose'           => 'required|integer|min:0',
            'check_price'    => 'required|integer|min:0',
            'drug_price'     => 'required|integer|min:0',
            'cure_price'     => 'required|integer|min:0',
            'hospital_price' => 'required|integer|min:0',
            'content'        => 'required|string|min:4',
        ];
    }

    public function messages()
    {
        return [
            'doctor_id.required'      => '请选择医生',
            'dose.required'           => '请输入药量',
            'check_price.required'    => '请输入检查费',
            'drug_price.required'     => '请输入药品费',
            'hospital_price.required' => '请输入住院费',
            'cure_price.required'     => '请输入治疗费',
            'dose.integer'            => '请输入数字',
            'check_price.integer'     => '请输入数字',
            'drug_price.integer'      => '请输入数字',
            'cure_price.integer'      => '请输入数字',
            'hospital_price.integer'  => '请输入数字',
            'content.required'        => '请输入备注',
            'content.min'             => '备注最少4个字符',
        ];
    }
}
