<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name'             => ['required', 'string', 'max:255'],
            'status'                => ['nullable', 'string', 'in:STABLE,ACTIVE CARE,CONSULTATION,SCANNING,COMPLETED'],
            'last_session_at'       => ['nullable', 'date'],
            'procedure_name'        => ['required', 'string', 'max:255'],
            'next_checkup_at'       => ['nullable', 'date'],
            'encrypted_files_count' => ['nullable', 'integer', 'min:0'],
            'primary_doctor'        => ['required', 'string', 'max:255'],
            'telemetry_status'      => ['nullable', 'string', 'max:255'],
        ];
    }
}