<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-[2rem] border border-gray-100">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Daftar Pengguna</h3>
                            <p class="text-gray-500">Kelola akses mahasiswa dan admin sistem</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-4">
                            <thead>
                                <tr class="text-gray-400 text-sm uppercase tracking-widest">
                                    <th class="px-6 py-4 font-medium">Nama & Email</th>
                                    <th class="px-6 py-4 font-medium">Role</th>
                                    <th class="px-6 py-4 font-medium">Status</th>
                                    <th class="px-6 py-4 font-medium">Terdaftar</th>
                                    <th class="px-6 py-4 font-medium text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="bg-gray-50 hover:bg-gray-100 transition duration-200 rounded-2xl group">
                                    <td class="px-6 py-6 rounded-l-2xl">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center font-bold">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <span class="block font-bold text-gray-900">{{ $user->name }}</span>
                                                <span class="text-sm text-gray-500">{{ $user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6">
                                        <span class="px-3 py-1 bg-white border border-gray-200 rounded-lg text-xs font-bold uppercase text-gray-600">
                                            {{ $user->getRoleNames()->first() ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-6">
                                        @if($user->is_active)
                                            <span class="flex items-center text-emerald-600 text-sm font-bold">
                                                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span class="flex items-center text-rose-600 text-sm font-bold">
                                                <span class="w-2 h-2 bg-rose-500 rounded-full mr-2"></span>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-6">
                                        <span class="text-sm text-gray-600">{{ $user->created_at->format('d M Y') }}</span>
                                    </td>
                                    <td class="px-6 py-6 rounded-r-2xl text-center">
                                        <div class="flex justify-center space-x-2">
                                            <form action="{{ route('admin.users.toggle', $user) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="p-2 {{ $user->is_active ? 'text-amber-600 hover:bg-amber-50' : 'text-emerald-600 hover:bg-emerald-50' }} rounded-xl transition tooltip" title="{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-xl transition">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
