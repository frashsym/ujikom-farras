<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        {{-- Fitur admin --}}
        @auth
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between mb-4">
                            <h1 class="text-2xl font-bold">Data Pembayaran Spp</h1>
                            <form method="GET" action="{{ route('index') }}" class="d-flex align-items-center">
                                <label for="bulan" class="me-2">Pilih Bulan:</label>
                                <select name="bulan" id="bulan" class="form-select me-2"
                                    onchange="this.form.submit()">
                                    <option value="">-- Semua Bulan --</option>
                                    @php
                                        $daftarBulan = [
                                            'Januari',
                                            'Februari',
                                            'Maret',
                                            'April',
                                            'Mei',
                                            'Juni',
                                            'Juli',
                                            'Agustus',
                                            'September',
                                            'Oktober',
                                            'November',
                                            'Desember',
                                        ];
                                    @endphp
                                    @foreach ($daftarBulan as $bulan)
                                        <option value="{{ $bulan }}"
                                            {{ request('bulan') == $bulan ? 'selected' : '' }}>
                                            {{ $bulan }}
                                        </option>
                                    @endforeach
                                </select>

                                @if (request('bulan'))
                                    <button onclick="printDiv('print-area')" class="btn btn-primary ms-3" type="button">
                                        Cetak Data Bulan {{ request('bulan') }}
                                    </button>
                                @endif
                                <input type="text" name="nisn" id="nisn" placeholder="Cari berdasarkan NISN"
                                    class="border rounded px-2 py-1">
                                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded">Cari</button>
                            </form>
                            @if (Route::has('login'))
                                <br>
                                <a href="{{ url('/dashboard') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                    Dashboard
                                </a>
                            @endif
                        </div>
                        <div id="print-area">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">No.</th>
                                        <th class="py-2 px-4 border-b">Nama Siswa</th>
                                        <th class="py-2 px-4 border-b">Kelas</th>
                                        <th class="py-2 px-4 border-b">Tanggal Bayar</th>
                                        <th class="py-2 px-4 border-b">Bulan Bayar</th>
                                        <th class="py-2 px-4 border-b">Tahun Bayar</th>
                                        <th class="py-2 px-4 border-b">Spp</th>
                                        <th class="py-2 px-4 border-b">Jumlah Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayaran as $bayar)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                            <td class="py-2 px-4 border-b">{{ $bayar->siswa->nama }}</td>
                                            <td class="py-2 px-4 border-b">{{ $bayar->siswa->kelas->nama_kelas }}
                                                {{ $bayar->siswa->kelas->kompetensi_keahlian }}</td>
                                            <td class="py-2 px-4 border-b">{{ $bayar->tanggal_bayar }}</td>
                                            <td class="py-2 px-4 border-b">{{ $bayar->bulan_bayar }}</td>
                                            <td class="py-2 px-4 border-b">{{ $bayar->tahun_bayar }}</td>
                                            <td class="py-2 px-4 border-b">{{ $bayar->spp->tahun }} -
                                                {{ $bayar->spp->nominal }}
                                            <td class="py-2 px-4 border-b">{{ $bayar->jumlah_bayar }}</td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        {{-- Akhir fitur admin --}}

        {{-- Fitur pencarian NISN (yang digunakan siswa) --}}
        @guest
            <center>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex justify-between mb-4">
                                <h1 class="text-2xl font-bold">Cari Data Pembayaran Spp</h1>
                                <form method="GET" action="{{ route('index') }}" class="d-flex align-items-center">
                                    <input type="text" name="nisn" id="nisn" placeholder="Cari berdasarkan NISN"
                                        class="border rounded px-2 py-1">
                                    <button type="submit"
                                        class="ml-2 bg-blue-500 text-white px-4 py-1 rounded">Cari</button>
                                </form>
                            </div>

                            {{-- Hanya tampilkan tabel jika ada hasil pencarian --}}
                            @if (request('nisn'))
                                @if ($pembayaran->isEmpty())
                                    <div class="text-center py-4 text-red-500">
                                        Data tidak ditemukan untuk NISN tersebut.
                                    </div>
                                @else
                                    <table class="min-w-full bg-white border border-gray-200 mt-4">
                                        <thead>
                                            <tr>
                                                <th class="py-2 px-4 border-b">No.</th>
                                                <th class="py-2 px-4 border-b">Nama Siswa</th>
                                                <th class="py-2 px-4 border-b">Kelas</th>
                                                <th class="py-2 px-4 border-b">Tanggal Bayar</th>
                                                <th class="py-2 px-4 border-b">Bulan Bayar</th>
                                                <th class="py-2 px-4 border-b">Tahun Bayar</th>
                                                <th class="py-2 px-4 border-b">Spp</th>
                                                <th class="py-2 px-4 border-b">Jumlah Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pembayaran as $bayar)
                                                <tr>
                                                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                                    <td class="py-2 px-4 border-b">{{ $bayar->siswa->nama }}</td>
                                                    <td class="py-2 px-4 border-b">{{ $bayar->siswa->kelas->nama_kelas }}
                                                        {{ $bayar->siswa->kelas->kompetensi_keahlian }}</td>
                                                    <td class="py-2 px-4 border-b">{{ $bayar->tanggal_bayar }}</td>
                                                    <td class="py-2 px-4 border-b">{{ $bayar->bulan_bayar }}</td>
                                                    <td class="py-2 px-4 border-b">{{ $bayar->tahun_bayar }}</td>
                                                    <td class="py-2 px-4 border-b">{{ $bayar->spp->tahun }} -
                                                        {{ $bayar->spp->nominal }}</td>
                                                    <td class="py-2 px-4 border-b">{{ $bayar->jumlah_bayar }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </center>
        @endguest
        {{-- Akhir fitur siswa --}}
    </div>
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            // Kembalikan ke tampilan awal
            document.body.innerHTML = originalContents;
            window.location.reload(); // supaya halaman kembali seperti semula
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</body>

</html>
