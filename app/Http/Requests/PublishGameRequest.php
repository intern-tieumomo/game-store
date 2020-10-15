<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishGameRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required|numeric|min:0',
            'release_date' => 'required',
            'summary' => 'required',
            'features' => 'required',
            'preview' => 'required|file|max:10240',
            'detail_1' => 'required|file|max:10240',
            'detail_2' => 'required|file|max:10240',
            'detail_3' => 'required|file|max:10240',
        ];
    }
}
