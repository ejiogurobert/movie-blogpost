<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'likes' => 'required|integer',
            'dislikes' => 'required|integer',
            'published_at' => 'required|date',
            'edited_at' => 'required|date',
            'movie_id' => 'required|exists:movies,id',
        ];
    }
}
