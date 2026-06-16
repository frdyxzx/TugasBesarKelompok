<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pegawai
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow max-w-3xl">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Nama Pegawai</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Password Baru</label>
                <input type="password" name="password" class="w-full border rounded p-2">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Cabang</label>
                <select name="cabang_id" class="w-full border rounded p-2">
                    <option value="">-- Pilih Cabang --</option>
                    @foreach($cabangs as $cabang)
                        <option value="{{ $cabang->id }}" {{ $user->cabang_id == $cabang->id ? 'selected' : '' }}>
                            {{ $cabang->nama_cabang }} - {{ $cabang->kota }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Role</label>
                <select name="role" class="w-full border rounded p-2" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>

            <a href="{{ route('users.index') }}" class="ml-2 text-gray-600">
                Kembali
            </a>
        </form>
    </div>
</x-app-layout>
