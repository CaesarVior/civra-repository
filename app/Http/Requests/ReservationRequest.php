<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $phone = $this->phone_number;
        if ($phone) {
            $phone = preg_replace('/[^0-9]/', '', $phone);
            if (str_starts_with($phone, '0')) {
                $phone = '62'.substr($phone, 1);
            }
            $this->merge(['phone_number' => $phone]);
        }

        // Sanitasi XSS Input
        $this->merge([
            'name' => strip_tags($this->name),
            'order' => strip_tags($this->order),
            'device' => strip_tags($this->device),
            'description' => $this->description ? strip_tags($this->description) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'phone_number' => ['required', 'string', 'regex:/^628[1-9][0-9]{7,11}$/'],
            'order' => ['required', 'string', 'max:255'],
            'device' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:500'],
            'start_date' => ['required', 'date', 'after_or_equal:now'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama lengkap minimal terdiri dari 3 karakter.',
            'phone_number.required' => 'Nomor WhatsApp wajib diisi.',
            'phone_number.regex' => 'Format nomor WhatsApp tidak valid. Gunakan format seperti 08123456789.',
            'order.required' => 'Pesanan minuman wajib diisi.',
            'device.required' => 'Pilihan device/meja wajib diisi.',
            'start_date.required' => 'Waktu mulai reservasi wajib diisi.',
            'start_date.after_or_equal' => 'Waktu mulai reservasi tidak boleh di masa lalu.',
            'end_date.required' => 'Waktu selesai reservasi wajib diisi.',
            'end_date.after' => 'Waktu selesai reservasi harus setelah waktu mulai.',
        ];
    }
}
