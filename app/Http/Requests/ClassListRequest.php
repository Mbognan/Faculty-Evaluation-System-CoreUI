<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

                'StudentId'  => 'required',
                'StudentId.*' => 'required|exists:users,student_id',
                'semester'   => 'required',
                'subject'    => 'required',

        ];
    }
}
