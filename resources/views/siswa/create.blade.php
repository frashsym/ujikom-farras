<x-app-layout>

    <div class="container">
        <center>
            <h1>Create New Siswa</h1>
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nisn" class="form-label">Nisn</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" required>
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">Nis</label>
                    <input type="text" class="form-control" id="nis" name="nis" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas</label>
                    <select class="form-control" id="id_kelas" name="id_kelas" required>
                        @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No. Telp</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                </div>
                <div class="mb-3">
                    <label for="id_spp" class="form-label">Spp</label>
                    <select class="form-control" id="id_spp" name="id_spp" required>
                        @foreach ($spp as $sp)
                            <option value="{{ $sp->id }}">{{ $sp->tahun }} - {{ $sp->nominal }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
    </div>
    </center>
</x-app-layout>
