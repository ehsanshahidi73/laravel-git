<?php

namespace App\Http\Requests;

use App\Rules\UpperCase;
use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            //'title' => ['required','bail','max:200',new UpperCase()],
            'description' => 'required',
            'photo'=>['required','max:1000','mimes:jpeg,png,jpg']
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'لطفا عنوان مظلب را وارد کنید.',
            'description.required' => 'لطفا عنوان توضیح  را وارد کنید.',
            'photo.required' => 'لطفا تصویر را انتخاب کنید.',
            'photo.max' => 'حجم تصویر شما نباید بیش از یک مگابایت باشد.',
            'photo.mimes' => 'نوع تصوویر شما باید jpg یا png یا jpeg  باشد .',
        ];
    }
}
