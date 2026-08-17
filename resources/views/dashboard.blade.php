<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display font-bold text-xl text-slate-100 leading-tight flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-pulse"></span>
                Dent<span class="text-cyan-400">Pulse</span> Landing
            </h2>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                    LIVE TELEMETRY
                </span>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-cyan-500 selection:text-slate-950 min-h-screen overflow-x-hidden relative">
        
        <!-- Ambient Glowing Orbs Background -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute -top-40 -left-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-[128px] animate-pulse"></div>
            <div class="absolute top-1/3 -right-40 w-96 h-96 bg-purple-500/10 rounded-full blur-[128px] animate-pulse"></div>
        </div>

        <div class="relative z-10 flex flex-col min-h-screen">
            
            <!-- Hero & Feature Section -->
            <main class="flex-1 max-w-7xl mx-auto px-6 pt-8 pb-24 flex flex-col justify-center w-full">
                
                @if (session('status'))
                    <div class="mb-8 p-4 rounded-xl bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 font-mono text-xs flex items-center justify-between">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <div class="text-center max-w-3xl mx-auto mb-16">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/80 backdrop-blur-md border border-cyan-500/20 text-xs font-mono text-cyan-300 mb-6 shadow-[0_0_15px_rgba(6,182,212,0.1)]">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                        NEXT-GEN CLINICAL INTELLIGENCE
                    </div>
                    
                    <h1 class="font-display text-4xl sm:text-6xl font-bold tracking-tight mb-6 leading-tight">
                        Dental records, <br/>
                        <span class="bg-gradient-to-r from-cyan-400 via-sky-400 to-purple-500 bg-clip-text text-transparent">reimagined for tomorrow.</span>
                    </h1>
                    
                    <p class="text-slate-400 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto mb-8">
                        Streamline patient intelligence, digital chart cards, and real-time care telemetry inside a minimal, hyper-responsive workspace.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('patients.create') }}" class="w-full sm:w-auto">
                            <button class="w-full sm:w-auto px-8 py-3.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl shadow-[0_0_25px_rgba(34,211,238,0.3)] hover:shadow-[0_0_35px_rgba(34,211,238,0.5)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                                Create Patient Profile
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Interactive Tabbed Display -->
                <div x-data="{ activeTab: 'cards' }" class="w-full">
                    
                    <!-- Tab Controls -->
                    <div class="flex justify-center mb-8">
                        <div class="bg-slate-900/80 backdrop-blur-md p-1.5 rounded-2xl inline-flex gap-2 border border-slate-800/80 shadow-2xl">
                            <button 
                                @click="activeTab = 'cards'"
                                :class="activeTab === 'cards' ? 'bg-cyan-500/10 text-cyan-300 border-cyan-500/40 shadow-[0_0_15px_rgba(6,182,212,0.15)]' : 'text-slate-400 border-transparent hover:text-slate-200'"
                                class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold font-mono border transition-all duration-200 flex items-center gap-2">
                                PATIENT CARDS
                            </button>
                            <button 
                                @click="activeTab = 'records'"
                                :class="activeTab === 'records' ? 'bg-cyan-500/10 text-cyan-300 border-cyan-500/40 shadow-[0_0_15px_rgba(6,182,212,0.15)]' : 'text-slate-400 border-transparent hover:text-slate-200'"
                                class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold font-mono border transition-all duration-200 flex items-center gap-2">
                                CENTRAL RECORDS
                            </button>
                        </div>
                    </div>

                    <!-- Tab 1: Patient Cards -->
                    <div x-show="activeTab === 'cards'" x-transition>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse($patients as $patient)
                                <div class="bg-slate-900/40 backdrop-blur-md border border-slate-800/80 hover:border-cyan-500/40 p-6 rounded-2xl relative overflow-hidden group transition-all duration-300 hover:shadow-[0_0_30px_rgba(6,182,212,0.15)] hover:-translate-y-1">
                                    <div class="flex items-start justify-between mb-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-cyan-400 to-blue-600 flex items-center justify-center font-bold text-slate-950 font-display shadow-lg shadow-cyan-500/20">
                                                {{ $patient->initials }}
                                            </div>
                                            <div>
                                                <h3 class="font-bold text-slate-100 text-lg group-hover:text-cyan-300 transition-colors">{{ $patient->full_name }}</h3>
                                                <p class="text-xs font-mono text-slate-400">ID: #{{ $patient->patient_number }}</p>
                                            </div>
                                        </div>
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-semibold bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                                            {{ $patient->status }}
                                        </span>
                                    </div>

                                    <div class="space-y-3 mb-6 font-mono text-xs">
                                        <div class="flex justify-between py-2 border-b border-slate-800/60">
                                            <span class="text-slate-400">LAST SESSION</span>
                                            <span class="text-slate-200">{{ $patient->last_session_at?->format('M d, Y') ?? 'N/A' }}</span>
                                        </div>
                                        <div class="flex justify-between py-2 border-b border-slate-800/60">
                                            <span class="text-slate-400">PROCEDURE</span>
                                            <span class="text-cyan-300">{{ $patient->procedure_name }}</span>
                                        </div>
                                        <div class="flex justify-between py-2">
                                            <span class="text-slate-400">NEXT CHECKUP</span>
                                            <span class="text-slate-200">{{ $patient->next_checkup_at?->format('M d, Y') ?? 'N/A' }}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between pt-2 border-t border-slate-800/40">
                                        <span class="text-xs text-slate-400 font-mono">{{ $patient->encrypted_files_count }} Encrypted Files</span>
                                        <button class="text-xs font-semibold text-cyan-400 hover:text-cyan-300 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                            Open Card &rarr;
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12 text-slate-500 font-mono text-sm">
                                    No patient records found. Click "Create Patient Profile" to register one.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Tab 2: Records Table -->
                    <div x-show="activeTab === 'records'" x-transition class="bg-slate-900/40 backdrop-blur-md rounded-2xl overflow-hidden border border-slate-800/80 shadow-2xl">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-slate-900/90 text-xs font-mono text-slate-400 uppercase border-b border-slate-800">
                                    <tr>
                                        <th class="px-6 py-4">Patient Record</th>
                                        <th class="px-6 py-4">Status</th>
                                        <th class="px-6 py-4">Primary Doctor</th>
                                        <th class="px-6 py-4">Telemetry</th>
                                        <th class="px-6 py-4 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800/50 text-slate-300 font-mono text-xs">
                                    @forelse($patients as $patient)
                                        <tr class="hover:bg-slate-800/30 transition-colors">
                                            <td class="px-6 py-4 font-sans font-semibold text-slate-100">
                                                {{ $patient->full_name }}
                                                <span class="block text-[10px] font-mono text-slate-500">#{{ $patient->patient_number }}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="px-2 py-0.5 rounded text-[10px] bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                                                    {{ $patient->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 font-sans">{{ $patient->primary_doctor }}</td>
                                            <td class="px-6 py-4 text-cyan-400">{{ $patient->telemetry_status }}</td>
                                            <td class="px-6 py-4 text-right font-sans">
                                                <button class="text-slate-400 hover:text-cyan-300 transition-colors">View Vault &rarr;</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-8 text-center text-slate-500 font-mono">
                                                No records registered in vault.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </main>

            <!-- Minimal Footer -->
            <footer class="w-full max-w-7xl mx-auto px-6 py-8 border-t border-slate-900 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 font-mono gap-4">
                <div>&copy; 2026 DentPulse Systems Inc. High-speed clinical telemetry.</div>
            </footer>

        </div>
    </div>
</x-app-layout>