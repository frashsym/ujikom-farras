<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pembayaran') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-4">
                        <h1 class="text-2xl font-bold">Data Pembayaran</h1>
                        <a href="{{ route('pembayaran.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pembayaran</a>
                    </div>

                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">No.</th>
                                <th class="py-2 px-4 border-b">User</th>
                                <th class="py-2 px-4 border-b">Nama Siswa</th>
                                <th class="py-2 px-4 border-b">Tanggal Bayar</th>
                                <th class="py-2 px-4 border-b">Bulan Bayar</th>
                                <th class="py-2 px-4 border-b">Tahun Bayar</th>
                                <th class="py-2 px-4 border-b">Spp</th>
                                <th class="py-2 px-4 border-b">Jumlah Bayar</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $bayar)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bayar->user->nama }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bayar->siswa->nama }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bayar->tanggal_bayar }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bayar->bulan_bayar }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bayar->tahun_bayar }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bayar->spp->tahun }} - {{ $bayar->spp->nominal }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bayar->jumlah_bayar }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('pembayaran.edit', $bayar->id) }}" class="text-blue-500">Edit</a>
                                        |
                                        <form action="{{ route('pembayaran.destroy', $bayar->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pembayaran->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
