<x-app-layout>

    <div class="container">
        <center>
            <h1>Create New Spp</h1>
            <form action="{{ route('spp.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" required>
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="number" class="form-control" id="nominal" name="nominal" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
    </div>
    </center>
</x-app-layout>
