<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Pegawai
        </h2>
    </x-slot>

```
<div class="bg-white p-6 rounded-xl shadow">
    <a href="{{ route('users.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Tambah Pegawai
    </a>

    <div class="mt-4 overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-3">No</th>
                    <th class="border p-3">Nama</th>
                    <th class="border p-3">Email</th>
                    <th class="border p-3">Cabang</th>
                    <th class="border p-3">Role</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border p-3">{{ $loop->iteration }}</td>

                        <td class="border p-3">
                            {{ $user->name }}
                        </td>

                        <td class="border p-3">
                            {{ $user->email }}
                        </td>

                        <td class="border p-3">
                            {{ $user->cabang?->nama_cabang ?? '-' }}
                        </td>

                        <td class="border p-3">
                            {{ $user->roles->pluck('name')->implode(', ') }}
                        </td>

                        <td class="border p-3">
                            <div class="flex gap-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus pegawai ini?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
```

</x-app-layout>
