<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Request::input('user_id') == \Auth::user()->id || \Auth::user()->rol_id == '4' || \Auth::user()->rol_id == '2'){
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
            'imagen'    =>  'image'
        ];
    }
}
