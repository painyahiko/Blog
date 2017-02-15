<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->rol_id == '4' || \Auth::user()->rol_id == '3' || \Auth::user()->rol_id == '2'){
            return true;
        } else {
            abort(403);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     =>  'required',
            'category'  =>  'required',
            'content'   =>  'required|min:10',
            'imagen'    =>  'required|image'
        ];
    }
}
