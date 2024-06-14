<x-layout>
    @push('links')
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    @endpush
    <x-slot:card_title>Pasien</x-slot>
    <form action="{{ route('pasien.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}">
            @error('kode')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
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
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
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
            <label for="kelurahan_id">Kelurahan</label>
            <select name="kelurahan_id" id="kelurahan_id" class="custom-select">
                <option value="">--- Pilih ---</option>
                @foreach ($list_kelurahan as $kelurahan)
                    <option value="{{ $kelurahan->id }}"
                        {{ old('kelurahan_id') == $kelurahan->id ? 'selected' : '' }}>
                        {{ $kelurahan->nama }}
                    </option>
                @endforeach
            </select>
            @error('kelurahan_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('pasien') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    @push('scripts')
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <script>
            $("#tgl_lahir").datetimepicker({
                format: "L",
            });
        </script>
    @endpush
</x-layout>
