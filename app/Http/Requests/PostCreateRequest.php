<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostCreateRequest extends Request
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
            //
            'category_id' => 'required',
            'photo_id' => 'required',
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:6|max:25000'  
        ];
    }
}
