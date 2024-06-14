<x-layout>
    @push('links')
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    @endpush
    <x-slot:card_title>Periksa</x-slot>
    <form action="{{ route('periksa.update', $periksa->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <div class="input-group date" id="tanggal" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" value="{{ $periksa->tanggal }}"
                    data-target="#tanggal" name="tanggal" />
                <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                    <div class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
            @error('tanggal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="berat">Berat</label>
            <input type="number" step="0.1" class="form-control" id="berat" name="berat"
                value="{{ $periksa->berat }}">
            @error('berat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tinggi">Tinggi</label>
            <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi"
                value="{{ $periksa->tinggi }}">
            @error('tinggi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tensi">Tensi</label>
            <input type="text" class="form-control" id="tensi" name="tensi" value="{{ $periksa->tensi }}">
            @error('tensi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan"
                value="{{ $periksa->keterangan }}">
            @error('keterangan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="pasien_id">Pasien</label>
            <select name="pasien_id" id="pasien_id" class="custom-select">
                <option value="">--- Pilih ---</option>
                @foreach ($list_pasien as $pasien)
                    <option value="{{ $pasien->id }}" {{ $periksa->pasien_id == $pasien->id ? 'selected' : '' }}>
                        {{ $pasien->nama }}
                    </option>
                @endforeach
            </select>
            @error('pasien_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="paramedik_id">Paramedik</label>
            <select name="paramedik_id" id="paramedik_id" class="custom-select">
                <option value="">--- Pilih ---</option>
                @foreach ($list_paramedik as $paramedik)
                    <option value="{{ $paramedik->id }}"
                        {{ $periksa->paramedik_id == $paramedik->id ? 'selected' : '' }}>
                        {{ $paramedik->nama }}
                    </option>
                @endforeach
            </select>
            @error('paramedik_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('periksa') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    @push('scripts')
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <script>
            $("#tanggal").datetimepicker({
                format: "DD/MM/YYYY",
            });
        </script>
    @endpush
</x-layout>
