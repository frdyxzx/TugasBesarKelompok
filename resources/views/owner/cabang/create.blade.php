<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Cabang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">

                <form action="{{ route('cabangs.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1">Nama Cabang</label>
                        <input type="text" name="nama_cabang" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Kota</label>
                        <input type="text" name="kota" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Alamat</label>
                        <textarea name="alamat" class="w-full border rounded p-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Telepon</label>
                        <input type="text" name="telepon" class="w-full border rounded p-2">
                    </div>

                    <button type="submit" class="text-gray-600 font-semibold px-4 py-2 rounded">
                        Simpan
                    </button>

                    <a href="{{ route('cabangs.index') }}" class="ml-2 text-gray-600">
                        Kembali
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
