<x-layout>
    <x-slot:card_title>Unit Kerja</x-slot>
    <form action="{{ route('unitkerja.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Unit Kerja</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('unitkerja') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
