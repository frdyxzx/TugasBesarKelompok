<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Cabang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('cabangs.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Cabang
            </a>

            <div class="bg-white shadow rounded-lg mt-4 p-4">
                <table class="w-full border">
                    <thead>
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Cabang</th>
                            <th class="border p-2">Kota</th>
                            <th class="border p-2">Alamat</th>
                            <th class="border p-2">Telepon</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cabangs as $cabang)
                        <tr>
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $cabang->nama_cabang }}</td>
                            <td class="border p-2">{{ $cabang->kota }}</td>
                            <td class="border p-2">{{ $cabang->alamat }}</td>
                            <td class="border p-2">{{ $cabang->telepon }}</td>
                            <td class="border p-2">
                            <div class="flex gap-2">
                                <a href="{{ route('cabangs.edit', $cabang->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('cabangs.destroy', $cabang->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Yakin ingin menghapus cabang ini?')"
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
    </div>
</x-app-layout>
