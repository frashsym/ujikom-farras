<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Kelas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-4">
                        <h1 class="text-2xl font-bold">Data Kelas</h1>
                        <a href="{{ route('kelas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Kelas</a>
                    </div>

                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">No.</th>
                                <th class="py-2 px-4 border-b">Kelas</th>
                                <th class="py-2 px-4 border-b">Kompetensi Keahlian</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $k)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 border-b">{{ $k->nama_kelas }}</td>
                                    <td class="py-2 px-4 border-b">{{ $k->kompetensi_keahlian }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('kelas.edit', $k->id) }}" class="text-blue-500">Edit</a>
                                        |
                                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $kelas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
