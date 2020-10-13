<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Label;
use App\Models\User;

class TaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'string|max:255',
            'status' => Rule::in(\Config::get('constants.status')),
            'labels' => ['array', Rule::in(Label::all()->pluck('id'))],
            'user_id' => Rule::in(User::all()->pluck('id')),
            'image' => 'image:jpeg,png,jpg,gif,svg'
        ];
    }
}
