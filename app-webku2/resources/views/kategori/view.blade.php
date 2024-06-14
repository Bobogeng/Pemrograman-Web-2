<x-layout>
    <x-slot:card_title>Kategori</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">Nama Kategori</th>
            <td>{{ $kategori->nama }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('kategori') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
