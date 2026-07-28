<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'nullable|string',
        ];

        if ($this->isMethod('post')) {
            $rules['photo'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['photo'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }

        return $rules;
    }
}
