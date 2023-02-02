<?php

namespace App\Http\Requests;

use App\Rules\CommentFile;
use Illuminate\Foundation\Http\FormRequest;

class MakeControllerStore extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'g-recaptcha-response' => 'required',
            'parrent_id' => 'nullable|numeric|exists:comments,id',
            'name' => 'required|min:3|max:150',
            'email' => 'required|email',
            'url' => 'url|nullable',
            'file' => ['nullable', 'file', 'mimes:png,jpg,gif,txt', new CommentFile],
            'comment' => 'required'
        ];
    }
}
