<x-layout>
    <x-slot:card_title>Kelurahan</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">Nama Kelurahan</th>
            <td>{{ $kelurahan->nama }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('kelurahan') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
