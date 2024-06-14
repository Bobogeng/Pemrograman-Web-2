<x-layout>
    <x-slot:card_title>Unit Kerja</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">Nama Unit Kerja</th>
            <td>{{ $unitkerja->nama }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('unitkerja') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
