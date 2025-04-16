<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Siswa') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-4">
                        <h1 class="text-2xl font-bold">Data Siswa</h1>
                        <a href="{{ route('siswa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Siswa</a>
                    </div>

                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">No.</th>
                                <th class="py-2 px-4 border-b">Nisn</th>
                                <th class="py-2 px-4 border-b">Nis</th>
                                <th class="py-2 px-4 border-b">Nama</th>
                                <th class="py-2 px-4 border-b">Kelas</th>
                                <th class="py-2 px-4 border-b">Alamat</th>
                                <th class="py-2 px-4 border-b">No. Telp</th>
                                <th class="py-2 px-4 border-b">Spp</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(request('nisn')) 
                            @foreach ($siswa as $sis)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 border-b">{{ $sis->nisn }}</td>
                                    <td class="py-2 px-4 border-b">{{ $sis->nis }}</td>
                                    <td class="py-2 px-4 border-b">{{ $sis->nama }}</td>
                                    <td class="py-2 px-4 border-b">{{ $sis->kelas->nama_kelas }} {{ $sis->kelas->kompetensi_keahlian }}</td>
                                    <td class="py-2 px-4 border-b">{{ $sis->alamat }}</td>
                                    <td class="py-2 px-4 border-b">{{ $sis->no_telp }}</td>
                                    <td class="py-2 px-4 border-b">{{ $sis->spp->tahun }} - {{ $sis->spp->nominal }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('siswa.edit', $sis->nisn) }}" class="text-blue-500">Edit</a>
                                        |
                                        <form action="{{ route('siswa.destroy', $sis->nisn) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
