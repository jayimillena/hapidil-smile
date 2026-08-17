<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_number',
        'full_name',
        'status',
        'last_session_at',
        'procedure_name',
        'next_checkup_at',
        'encrypted_files_count',
        'primary_doctor',
        'telemetry_status',
    ];

    protected $casts = [
        'last_session_at' => 'datetime',
        'next_checkup_at' => 'datetime',
        'encrypted_files_count' => 'integer',
    ];

    /**
     * Generate 2-letter initials for avatar badges.
     */
    public function getInitialsAttribute(): string
    {
        return Str::of($this->full_name)
            ->explode(' ')
            ->map(fn ($name) => Str::substr($name, 0, 1))
            ->take(2)
            ->implode('');
    }

    /**
     * Compute theme accent color based on status.
     */
    public function getAccentColorAttribute(): string
    {
        return match (strtoupper($this->status)) {
            'ACTIVE CARE' => 'purple',
            'COMPLETED'   => 'emerald',
            default       => 'cyan',
        };
    }
}