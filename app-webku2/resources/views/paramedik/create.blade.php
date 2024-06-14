<x-layout>
    @push('links')
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    @endpush
    <x-slot:card_title>Paramedik</x-slot>
    <form action="{{ route('paramedik.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Paramedik</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="gender" id="gender1" value="L"
                    {{ old('gender') == 'L' ? 'checked' : '' }}>
                <label for="gender1" class="custom-control-label">Laki-laki</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="gender" id="gender2" value="P"
                    {{ old('gender') == 'P' ? 'checked' : '' }}>
                <label for="gender2" class="custom-control-label">Perempuan</label>
            </div>
            @error('gender')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="{{ old('tmp_lahir') }}">
            @error('tmp_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <div class="input-group date" id="tgl_lahir" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" value="{{ old('tgl_lahir') }}"
                    data-target="#tgl_lahir" name="tgl_lahir" />
                <div class="input-group-append" data-target="#tgl_lahir" data-toggle="datetimepicker">
                    <div class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
            @error('tgl_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="telpon">Nomor Telpon</label>
            <input type="tel" class="form-control" id="telpon" name="telpon" value="{{ old('telpon') }}">
            @error('telpon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="custom-select">
                <option value="">--- Pilih ---</option>
                @foreach ($list_kategori as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="unit_kerja_id">Unit Kerja</label>
            <select name="unit_kerja_id" id="unit_kerja_id" class="custom-select">
                <option value="">--- Pilih ---</option>
                @foreach ($list_unitkerja as $unitkerja)
                    <option value="{{ $unitkerja->id }}"
                        {{ old('unit_kerja_id') == $unitkerja->id ? 'selected' : '' }}>
                        {{ $unitkerja->nama }}
                    </option>
                @endforeach
            </select>
            @error('unit_kerja_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('paramedik') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    @push('scripts')
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <script>
            $("#tgl_lahir").datetimepicker({
                format: "DD/MM/YYYY",
            });
        </script>
    @endpush
</x-layout>
