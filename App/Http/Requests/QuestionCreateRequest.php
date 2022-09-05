<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question'=> 'required | min:3 | max:200',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'answer1'=>'required | min:1 | max:200',
            'answer2'=>'required | min:1 | max:200',
            'answer3'=>'required | min:1 | max:200',
            'answer4'=>'required | min:1 | max:200',
            'correct_answer'=>'required'
        ];
    }
    public function attributes()
    {
        return [
            'question'=> 'Soru',
            'image'=>'Soru Fotoğrafı',
            'answer1'=>'1.CEVAP',
            'answer2'=>'2.CEVAP',
            'answer3'=>'3.CEVAP',
            'answer4'=>'4.CEVAP',
            'correct_answer'=>'Doğru Cevap',
        ];
    }
}
