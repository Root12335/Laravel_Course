<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'min:3',
                Rule::unique('posts', 'title')->ignore($this->route('post')),
            ],
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter a title.',
            'title.min' => 'Title must be at least 3 characters.',
            'title.unique' => 'This title already exists. Please choose another one.',
            'description.required' => 'Please enter a description.',
            'description.min' => 'Description must be at least 10 characters.',
            'user_id.required' => 'Please select a creator.',
            'user_id.exists' => 'The selected creator is invalid.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
    }
}
