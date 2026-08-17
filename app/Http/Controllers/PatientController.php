<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $patients = Patient::query()->latest()->get();

        return view('dashboard', compact('patients'));
    }


    public function create(): View
    {
        return view('patients.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['patient_number'] = 'PX-' . date('Y') . '-' . strtoupper(Str::random(4));
        $validated['telemetry_status'] = $validated['telemetry_status'] ?? 'Sync Complete';

        $patient = Patient::create($validated);

        return redirect()
            ->route('dashboard')
            ->with('status', "Patient record #{$patient->patient_number} successfully registered.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
