<x-layout>
    <x-slot:card_title>Pasien</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">Kode Pasien</th>
            <td>{{ $pasien->kode }}</td>
        </tr>
        <tr>
            <th>Nama Pasien</th>
            <td>{{ $pasien->nama }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $pasien->tmp_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $pasien->tgl_lahir }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $pasien->gender }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $pasien->email }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pasien->alamat }}</td>
        </tr>
        <tr>
            <th>Kelurahan</th>
            <td>{{ $pasien->kelurahan->nama }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('pasien') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
