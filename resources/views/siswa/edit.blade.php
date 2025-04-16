<x-app-layout>

    <div class="container">
        <center>
            <h1>Edit Siswa</h1>
            <form action="{{ route('siswa.update', $siswa->nisn) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="nis" class="form-label">Nis</label>
                    <input type="text" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas</label>
                    <select class="form-control" id="id_kelas" name="id_kelas" required>
                        @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}" {{ $siswa->id_kelas == $kls->id ? 'selected' : '' }}>
                                {{ $kls->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="{{ $siswa->alamat }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No. Telp</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp"
                        value="{{ $siswa->no_telp }}" required>
                </div>
                <div class="mb-3">
                    <label for="id_spp" class="form-label">Spp</label>
                    <select class="form-control" id="id_spp" name="id_spp" required>
                        @foreach ($spp as $sp)
                            <option value="{{ $sp->id }}" {{ $siswa->id_spp == $sp->id ? 'selected' : '' }}>
                                {{ $sp->tahun }} - {{ $sp->nominal }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </center>
    </div>
</x-app-layout>
