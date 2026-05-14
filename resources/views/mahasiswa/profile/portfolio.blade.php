<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-indigo-50 to-white min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-white">
                <!-- Cover Area -->
                <div class="h-64 bg-indigo-600 relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-violet-600 opacity-90"></div>
                    <div class="absolute -bottom-16 left-12">
                        <div class="w-32 h-32 rounded-[2rem] bg-white p-1 shadow-xl">
                            @if($mahasiswa->foto_profil)
                                <img src="{{ asset('storage/' . $mahasiswa->foto_profil) }}" class="w-full h-full object-cover rounded-[1.8rem]">
                            @else
                                <div class="w-full h-full bg-indigo-100 rounded-[1.8rem] flex items-center justify-center text-indigo-600 text-4xl font-bold">
                                    {{ substr($mahasiswa->user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="pt-20 pb-12 px-12 space-y-12">
                    <!-- Basic Info -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                        <div>
                            <h1 class="text-4xl font-extrabold text-gray-900">{{ $mahasiswa->user->name }}</h1>
                            <p class="text-xl text-gray-500 mt-2">{{ $mahasiswa->program_studi }} • {{ $mahasiswa->domisili }}</p>
                        </div>
                        <div class="flex space-x-3">
                            @if($mahasiswa->link_portofolio)
                                <a href="{{ $mahasiswa->link_portofolio }}" target="_blank" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100 flex items-center">
                                    <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    View Portfolio
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                        <div class="md:col-span-2 space-y-10">
                            <!-- Skills -->
                            <section>
                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Core Skills</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($mahasiswa->keahlian as $skill)
                                        <span class="px-4 py-2 bg-gray-50 text-gray-700 text-sm font-bold rounded-xl border border-gray-100">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </section>

                            <!-- About / Interests -->
                            <section>
                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Interests</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($mahasiswa->minat_lomba as $interest)
                                        <span class="px-4 py-2 bg-violet-50 text-violet-700 text-sm font-bold rounded-xl border border-violet-100">{{ $interest }}</span>
                                    @endforeach
                                </div>
                            </section>

                            <!-- Achievements -->
                            <section>
                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Prestasi & Pengalaman</h3>
                                <div class="space-y-4">
                                    <div class="p-6 bg-emerald-50 rounded-3xl border border-emerald-100 flex items-center space-x-6">
                                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-emerald-600 shadow-sm">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-900">Mahasiswa Aktif SiLomba</h4>
                                            <p class="text-xs text-gray-500">Bergabung sejak {{ $mahasiswa->created_at->format('M Y') }}</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-400 italic text-center py-4">Belum ada prestasi yang ditambahkan.</p>
                                </div>
                            </section>
                        </div>

                        <div class="space-y-8">
                            <div class="p-8 bg-gray-900 rounded-[2rem] text-white">
                                <h3 class="text-lg font-bold mb-4">Availability</h3>
                                <div class="flex items-center space-x-3 mb-6">
                                    <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                                    <span class="text-sm font-medium">{{ $mahasiswa->ketersediaan_waktu }}</span>
                                </div>
                                <hr class="border-gray-800 mb-6">
                                <h3 class="text-lg font-bold mb-4">Contact Info</h3>
                                <p class="text-sm text-gray-400">{{ $mahasiswa->user->email }}</p>
                                <p class="text-sm text-gray-500 mt-1">NIM: {{ $mahasiswa->nim }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
