<x-app-layout>

    <div class="container">
        <center>
            <h1>Edit Kelas</h1>
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
                </div>
                <div class="mb-3">
                    <label for="kompetensi_keahlian" class="form-label">Kompetensi keahlian</label>
                    <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{ $kelas->kompetensi_keahlian }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
    </div>
    </center>
</x-app-layout>
