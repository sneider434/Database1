<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttendeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $attendee = $this->route('attendee');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('attendees', 'name')
                    ->where(fn ($query) => $query->where('last_name', $this->input('last_name')))
                    ->ignore($attendee?->id),
            ],
            'last_name' => 'required|string|max:255',
            'email'     => [
                'required',
                'email',
                'max:255',
                Rule::unique('attendees', 'email')->ignore($attendee?->id),
            ],
            'phone'     => 'nullable|string|max:30',
            'image'     => 'nullable|image|max:' . ($attendee ? 5120 : 2048),
            'events'    => 'nullable|array',
            'events.*'  => 'exists:events,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Ya existe un asistente con ese nombre y apellido.',
        ];
    }
}
