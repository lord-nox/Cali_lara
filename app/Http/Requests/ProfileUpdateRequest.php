<?php 

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        if ($this->has('name') || $this->has('email')) {
            $rules['name'] = ['required', 'string', 'max:255'];
            $rules['email'] = [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ];
        }

        if ($this->has('birthday')) {
            $rules['birthday'] = ['nullable', 'date']; // Allow null or a valid date
        }

        if ($this->has('about_me')) {
            $rules['about_me'] = ['nullable', 'string', 'max:1000']; // Allow null or a string up to 1000 characters
        }

        if ($this->hasFile('profile_picture')) {
            $rules['profile_picture'] = ['nullable', 'image', 'max:2048']; // Ensure it's an image file
        }

        return $rules;
    }
}
