<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostMovies extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'chaine_id'=>'required',
            'titre'=>'required',
            'video_path'=>'required',
            'minuature_path'=>'required',
            'type'=>'required',
            'description'=>'required',
            'auteur'=>'required'
        ];
    }
}
