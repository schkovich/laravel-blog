<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 16/06/15
 * Time: 08:21
 */

namespace LaravelBlog\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'language_id' => 'required|integer',
            'blogcategory_id' => 'required|integer',
            'content' => 'required|min:20',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
