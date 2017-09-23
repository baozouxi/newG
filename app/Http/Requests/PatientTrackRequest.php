<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientTrackRequest extends FormRequest
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
            'next'       => 'required|date_format:Y-m-d H:i|after_or_equal:today',
            'content'    => 'required|string|min:6',
            'patient_id' => 'required|exists:patients,id|integer'
        ];
    }

    public function messages()
    {
        return [
            'next.required'    => '请输入下次回访日期',
            'content.required' => '请输入回访内容',
            'content.min'      => '请输入回访内容'
        ];
    }
}
