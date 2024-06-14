<x-layout>
    <x-slot:card_title>Kelurahan</x-slot>
    <form action="{{ route('kelurahan.update', $kelurahan->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kelurahan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kelurahan->nama }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('kelurahan') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
</x-layout>
