<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display font-bold text-xl text-slate-100 leading-tight flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-pulse"></span>
                Register New Patient Entity
            </h2>
            <a href="{{ route('patients.index') }}" class="text-xs font-mono text-slate-400 hover:text-cyan-400 transition-colors">
                &larr; Return to Registry
            </a>
        </div>
    </x-slot>

    <div class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen py-12 px-6 relative">
        <!-- Ambient Glow -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-cyan-500/10 rounded-full blur-[140px]"></div>
        </div>

        <div class="relative z-10 max-w-3xl mx-auto">
            <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800/80 rounded-2xl p-8 shadow-2xl">
                
                <div class="mb-8 border-b border-slate-800 pb-6">
                    <h1 class="text-2xl font-display font-bold text-slate-100">Patient Onboarding</h1>
                    <p class="text-slate-400 text-sm mt-1">Input patient telemetry metrics to instantiate a new record entity.</p>
                </div>

                <form action="{{ route('patients.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Full Name -->
                    <div>
                        <label for="full_name" class="block text-xs font-mono text-slate-300 uppercase tracking-wider mb-2">
                            Full Name <span class="text-cyan-400">*</span>
                        </label>
                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required
                            placeholder="e.g. Alex Zender"
                            class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-sans">
                        @error('full_name')
                            <p class="text-xs text-rose-400 font-mono mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grid Row 1 -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Care Status -->
                        <div>
                            <label for="status" class="block text-xs font-mono text-slate-300 uppercase tracking-wider mb-2">
                                Care Status <span class="text-cyan-400">*</span>
                            </label>
                            <select name="status" id="status" required
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-mono">
                                <option value="STABLE" {{ old('status') === 'STABLE' ? 'selected' : '' }}>STABLE</option>
                                <option value="ACTIVE CARE" {{ old('status') === 'ACTIVE CARE' ? 'selected' : '' }}>ACTIVE CARE</option>
                                <option value="CONSULTATION" {{ old('status') === 'CONSULTATION' ? 'selected' : '' }}>CONSULTATION</option>
                                <option value="SCANNING" {{ old('status') === 'SCANNING' ? 'selected' : '' }}>SCANNING</option>
                                <option value="COMPLETED" {{ old('status') === 'COMPLETED' ? 'selected' : '' }}>COMPLETED</option>
                            </select>
                            @error('status')
                                <p class="text-xs text-rose-400 font-mono mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Primary Doctor -->
                        <div>
                            <label for="primary_doctor" class="block text-xs font-mono text-slate-300 uppercase tracking-wider mb-2">
                                Primary Doctor <span class="text-cyan-400">*</span>
                            </label>
                            <input type="text" name="primary_doctor" id="primary_doctor" value="{{ old('primary_doctor') }}" required
                                placeholder="e.g. Dr. Vance (Ortho)"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-sans">
                            @error('primary_doctor')
                                <p class="text-xs text-rose-400 font-mono mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Procedure Name -->
                    <div>
                        <label for="procedure_name" class="block text-xs font-mono text-slate-300 uppercase tracking-wider mb-2">
                            Procedure Name <span class="text-cyan-400">*</span>
                        </label>
                        <input type="text" name="procedure_name" id="procedure_name" value="{{ old('procedure_name') }}" required
                            placeholder="e.g. 3D Align Scanning"
                            class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-sans">
                        @error('procedure_name')
                            <p class="text-xs text-rose-400 font-mono mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grid Row 2 -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Last Session Date -->
                        <div>
                            <label for="last_session_at" class="block text-xs font-mono text-slate-300 uppercase tracking-wider mb-2">
                                Last Session Date
                            </label>
                            <input type="date" name="last_session_at" id="last_session_at" value="{{ old('last_session_at') }}"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-mono">
                            @error('last_session_at')
                                <p class="text-xs text-rose-400 font-mono mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Next Checkup Date -->
                        <div>
                            <label for="next_checkup_at" class="block text-xs font-mono text-slate-300 uppercase tracking-wider mb-2">
                                Next Checkup Date
                            </label>
                            <input type="date" name="next_checkup_at" id="next_checkup_at" value="{{ old('next_checkup_at') }}"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-mono">
                            @error('next_checkup_at')
                                <p class="text-xs text-rose-400 font-mono mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Telemetry Status -->
                    <div>
                        <label for="telemetry_status" class="block text-xs font-mono text-slate-300 uppercase tracking-wider mb-2">
                            Initial Telemetry Note
                        </label>
                        <input type="text" name="telemetry_status" id="telemetry_status" value="{{ old('telemetry_status', 'Sync Complete') }}"
                            placeholder="e.g. CBCT 3D Render Ready"
                            class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-mono">
                        @error('telemetry_status')
                            <p class="text-xs text-rose-400 font-mono mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Actions -->
                    <div class="pt-4 flex items-center justify-end gap-4 border-t border-slate-800/80">
                        <a href="{{ route('patients.index') }}" class="px-6 py-3 text-xs font-mono text-slate-400 hover:text-slate-200 transition-colors">
                            CANCEL
                        </a>
                        <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl shadow-[0_0_20px_rgba(34,211,238,0.25)] hover:shadow-[0_0_30px_rgba(34,211,238,0.45)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 text-sm">
                            Commit Patient Record
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>