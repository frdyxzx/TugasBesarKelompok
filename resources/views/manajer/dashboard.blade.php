<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Manajer
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">📦 Total Barang</h3>
            <p class="text-4xl font-bold mt-2">0</p>
        </div>

        <div class="bg-green-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">🧾 Total Transaksi</h3>
            <p class="text-4xl font-bold mt-2">0</p>
        </div>

        <div class="bg-red-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">⚠️ Stok Menipis</h3>
            <p class="text-4xl font-bold mt-2">0</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-4">
                👋 Selamat Datang Manajer
            </h3>

            <p class="text-gray-600">
                Dashboard ini digunakan untuk memantau transaksi dan stok barang pada cabang minimarket.
            </p>

            <hr class="my-4">

            <p><strong>Tanggal :</strong> {{ now()->format('d F Y') }}</p>
            <p class="mt-2"><strong>Status Sistem :</strong> <span class="text-green-600 font-semibold">Aktif</span></p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-4">
                📌 Informasi Manajer
            </h3>

            <p><strong>Nama :</strong> {{ Auth::user()->name }}</p>
            <p class="mt-2"><strong>Email :</strong> {{ Auth::user()->email }}</p>
            <p class="mt-2"><strong>Role :</strong> Manajer</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow mt-6">

    <h3 class="text-xl font-bold mb-4">
        📌 Aktivitas Terbaru
    </h3>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-3">No</th>
                <th class="border p-3">Aktivitas</th>
                <th class="border p-3">Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="border p-3">1</td>
                <td class="border p-3">Monitoring stok barang</td>
                <td class="border p-3 text-green-600">Selesai</td>
            </tr>

            <tr>
                <td class="border p-3">2</td>
                <td class="border p-3">Monitoring transaksi</td>
                <td class="border p-3 text-green-600">Selesai</td>
            </tr>
        </tbody>
    </table>

</div>
</x-app-layout>
