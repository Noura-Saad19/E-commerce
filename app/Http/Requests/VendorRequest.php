<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vendorequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // required_without:id mean you must add logo in create form but it not necessary to add it in update
            'logo' => 'required_without:id|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:100',
            'mobile' =>'required|max:100|unique:vendors,mobile,'.$this -> id,
            'email'  => 'required|email|unique:vendors,email,'.$this -> id,
            'category_id'  => 'required|exists:main_categories,id',
            'address'   => 'string|max:500',
            'password'   => 'required_without:id'
        ];
    }


    public function messages(){

        return [
            'required'  => 'هذا الحقل مطلوب ',
            'max'  => 'هذا الحقل طويل',
            'category_id.exists'  => 'القسم غير موجود ',
            'email.email' => 'ضيغه البريد الالكتروني غير صحيحه',
            'address.string' => 'العنوان لابد ان يكون حروف او حروف وارقام ',
            'name.string'  =>'الاسم لابد ان يكون حروف او حروف وارقام ',
            'logo.required_without'  => 'الصوره مطلوبة',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل ',
            'mobile.unique' => 'رقم الهاتف مستخدم من قبل ',


        ];
    }
}
