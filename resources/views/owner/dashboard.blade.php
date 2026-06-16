<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Owner
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-blue-500 text-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-sm">🏪 Total Cabang</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalCabang }}</p>
                </div>

                <div class="bg-purple-500 text-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-sm">👥 Total Pegawai</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalPegawai }}</p>
                </div>

                <div class="bg-red-500 text-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-sm">👨‍💼 Total Manajer</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalManajer }}</p>
                </div>

                <div class="bg-green-500 text-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-sm">📦 Total Barang</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalBarang }}</p>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold mb-4">
                        👋 Selamat Datang Owner
                    </h3>

                    <p class="text-gray-600 mb-2">
                        Dashboard monitoring seluruh cabang minimarket Jayusman.
                    </p>

                    <hr class="my-4">

                    <p>
                        <strong>Tanggal :</strong>
                        {{ now()->format('d F Y') }}
                    </p>

                    <p class="mt-2">
                        <strong>Status Sistem :</strong>
                        <span class="text-green-600 font-semibold">Aktif</span>
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold mb-4">
                        📌 Informasi Owner
                    </h3>

                    <div class="space-y-2">
                        <p><strong>Nama :</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Role :</strong> Owner</p>
                    </div>
                </div>

            </div>

            <div class="bg-white p-6 rounded-xl shadow mt-6">
                <h3 class="text-xl font-bold mb-4">
                    🏪 Cabang Terbaru
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3">No</th>
                                <th class="border p-3">Nama Cabang</th>
                                <th class="border p-3">Kota</th>
                                <th class="border p-3">Telepon</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($cabangTerbaru as $cabang)
                                <tr>
                                    <td class="border p-3">{{ $loop->iteration }}</td>
                                    <td class="border p-3">{{ $cabang->nama_cabang }}</td>
                                    <td class="border p-3">{{ $cabang->kota }}</td>
                                    <td class="border p-3">{{ $cabang->telepon }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="border p-3 text-center">
                                        Belum ada data cabang
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
