<x-layout>
    <x-slot:card_title>Paramedik</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th>Nama Paramedik</th>
            <td>{{ $paramedik->nama }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $paramedik->gender }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $paramedik->tmp_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $paramedik->tgl_lahir }}</td>
        </tr>
        <tr>
            <th>Nomor Telpon</th>
            <td>{{ $paramedik->telpon }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $paramedik->alamat }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $paramedik->kategori->id }}</td>
        </tr>
        <tr>
            <th>Unit Kerja</th>
            <td>{{ $paramedik->unit_kerja->id }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('paramedik') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
