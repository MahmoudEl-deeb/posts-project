<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', Rule::unique('posts')->ignore($this->route('id')),],
            'description' => ['required', 'min:10'],
            
            'image' => ['nullable', 'image', 'mimes:jpg,png', 'max:2048']
        ];
    }
}