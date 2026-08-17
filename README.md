########################################################################
                      DENTPULSE - CLINICAL INTELLIGENCE
########################################################################

------------------------------------------------------------------------
1. OVERVIEW
------------------------------------------------------------------------
DentPulse is a modern dental clinical management interface designed for 
streamlined patient intelligence, digital chart tracking, and clinical telemetry. 

Key Capabilities:
  * Interactive Patient Cards view with profile badges and encrypted file tracking
  * Tabbed Central Records table for fast telemetry auditing and doctor assignments
  * Session date tracking and procedure status monitoring
  * Cyberpunk-inspired dark UI with ambient glowing accents and Alpine.js state management

------------------------------------------------------------------------
2. TECH STACK & DEPENDENCIES
------------------------------------------------------------------------
* Framework: Laravel (Blade Layouts & Route Helpers)
* Interactive UI: Alpine.js (x-data, x-show, x-transition tab state)
* Styling: Tailwind CSS (Custom color arbitrary values, dark mode classes)
* Backend Requirements: PHP >= 8.1, MySQL / MariaDB

------------------------------------------------------------------------
3. REQUIRED MODEL ATTRIBUTES ($patient)
------------------------------------------------------------------------
The view expects a `$patients` collection with models containing:
  - full_name                 (string)
  - patient_number            (string/integer)
  - initials                  (string, e.g., 'JD')
  - status                    (string)
  - primary_doctor            (string)
  - telemetry_status          (string)
  - procedure_name            (string)
  - encrypted_files_count     (integer)
  - last_session_at           (Carbon date instance / nullable)
  - next_checkup_at          (Carbon date instance / nullable)

------------------------------------------------------------------------
4. REQUIRED ROUTES
------------------------------------------------------------------------
Ensure the following route name is defined in your `routes/web.php`:
  * Route::get('/patients/create', [PatientController::class, 'create'])
         ->name('patients.create');

------------------------------------------------------------------------
5. LOCAL SETUP & RUNNING
------------------------------------------------------------------------
Step 1: Install dependencies
        $ composer install
        $ npm install

Step 2: Build assets with Tailwind CSS and Alpine.js
        $ npm run dev

Step 3: Run database migrations and seeders
        $ php artisan migrate --seed

Step 4: Launch local development server
        $ php artisan serve

------------------------------------------------------------------------
6. FILE STRUCTURE & LAYOUT COMPONENT
------------------------------------------------------------------------
* Blade View Path: resources/views/patients/index.blade.php
* Base Layout:     resources/views/layouts/app.blade.php (<x-app-layout>)
* Assets Required: Alpine.js must be loaded globally in app.blade.php