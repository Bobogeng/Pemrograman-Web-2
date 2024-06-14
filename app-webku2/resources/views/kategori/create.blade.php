<x-layout>
    <x-slot:card_title>Kategori</x-slot>
    <form action="{{ route('kategori.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('kategori') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
