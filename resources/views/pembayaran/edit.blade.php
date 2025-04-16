<x-app-layout>

    <div class="container">
        <center>
            <h1>Edit Pembayaran</h1>
            <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="nisn" class="form-label">Nama Siswa</label>
                    <select class="form-control" id="nisn" name="nisn" required>
                        @foreach ($siswa as $sis)
                            <option value="{{ $sis->nisn }}" {{ $pembayaran->nisn == $sis->nisn ? 'selected' : '' }}>
                                {{ $sis->nisn }} - {{ $sis->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                    <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar"
                        value="{{ $pembayaran->tanggal_bayar }}" required>
                </div>
                <div class="mb-3">
                    <label for="bulan_bayar" class="form-label">Bulan Bayar</label>
                    <input type="text" class="form-control" id="bulan_bayar" name="bulan_bayar"
                        value="{{ $pembayaran->bulan_bayar }}" required>
                </div>
                <div class="mb-3">
                    <label for="tahun_bayar" class="form-label">Tahun Bayar</label>
                    <input type="number" class="form-control" id="tahun_bayar" name="tahun_bayar"
                        value="{{ $pembayaran->tahun_bayar }}" required>
                </div>
                <div class="mb-3">
                    <label for="id_spp" class="form-label">Spp</label>
                    <select class="form-control" id="id_spp" name="id_spp" required>
                        @foreach ($spp as $sp)
                            <option value="{{ $sp->id }}" {{ $pembayaran->id_spp == $sp->id ? 'selected' : '' }}>
                                {{ $sp->tahun }} - {{ $sp->nominal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                    <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar"
                        value="{{ $pembayaran->jumlah_bayar }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </center>
    </div>
</x-app-layout>
