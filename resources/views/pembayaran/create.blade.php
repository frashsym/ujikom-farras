<x-app-layout>

    <div class="container">
        <center>
            <h1>Entri Pembayaran</h1>
            <form action="{{ route('pembayaran.store') }}" method="POST">
                @csrf
                {{-- <div class="mb-3">
                    <label for="id_user" class="form-label">User</label>
                    <select class="form-control" id="id_user" name="id_user" required>
                        @foreach ($user as $us)
                            <option value="{{ $us->id }}">{{ $us->nama }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="mb-3">
                    <label for="nisn" class="form-label">Nama Siswa</label>
                    <select class="form-control" id="nisn" name="nisn" required>
                        @foreach ($siswa as $sis)
                            <option value="{{ $sis->nisn }}">{{ $sis->nisn }} - {{ $sis->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                    <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required>
                </div>
                <div class="mb-3">
                    <label for="bulan_bayar" class="form-label">Bulan Bayar</label>
                    <input type="text" class="form-control" id="bulan_bayar" name="bulan_bayar" required>
                </div>
                <div class="mb-3">
                    <label for="tahun_bayar" class="form-label">Tahun Bayar</label>
                    <input type="number" class="form-control" id="tahun_bayar" name="tahun_bayar" required>
                </div>
                <div class="mb-3">
                    <label for="id_spp" class="form-label">Spp</label>
                    <select class="form-control" id="id_spp" name="id_spp" required>
                        @foreach ($spp as $sp)
                            <option value="{{ $sp->id }}">{{ $sp->tahun }} - {{ $sp->nominal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                    <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
    </div>
    </center>
</x-app-layout>
