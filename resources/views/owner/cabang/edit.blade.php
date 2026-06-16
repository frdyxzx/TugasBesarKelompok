<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Cabang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">

                <form action="{{ route('cabangs.update', $cabang->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1">Nama Cabang</label>
                        <input type="text"
                               name="nama_cabang"
                               value="{{ $cabang->nama_cabang }}"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Kota</label>
                        <input type="text"
                               name="kota"
                               value="{{ $cabang->kota }}"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Alamat</label>
                        <textarea name="alamat"
                                  class="w-full border rounded p-2">{{ $cabang->alamat }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Telepon</label>
                        <input type="text"
                               name="telepon"
                               value="{{ $cabang->telepon }}"
                               class="w-full border rounded p-2">
                    </div>

                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Update
                    </button>

                    <a href="{{ route('cabangs.index') }}"
                       class="ml-2 text-gray-600">
                        Kembali
                    </a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
