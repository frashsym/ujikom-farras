<x-app-layout>

    <div class="container">
        <center>
            <h1>Edit Spp</h1>
            <form action="{{ route('spp.update', $spp->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $spp->tahun }}" required>
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="number" class="form-control" id="nominal" name="nominal" value="{{ $spp->nominal }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
    </div>
    </center>
</x-app-layout>
