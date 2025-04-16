<x-app-layout>

    <div class="container">
        <center>
            <h1>Create New Kelas</h1>
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                </div>
                <div class="mb-3">
                    <label for="kompetensi_keahlian" class="form-label">Kompetensi keahlian</label>
                    <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
    </div>
    </center>
</x-app-layout>
