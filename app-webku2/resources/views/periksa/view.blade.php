<x-layout>
    <x-slot:card_title>Periksa</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th>Tanggal</th>
            <td>{{ $periksa->tanggal }}</td>
        </tr>
        <tr>
            <th>Berat</th>
            <td>{{ $periksa->berat }}</td>
        </tr>
        <tr>
            <th>Tinggi</th>
            <td>{{ $periksa->tinggi }}</td>
        </tr>
        <tr>
            <th>Tensi</th>
            <td>{{ $periksa->tensi }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $periksa->keterangan }}</td>
        </tr>
        <tr>
            <th>Pasien</th>
            <td>{{ $periksa->pasien->id }}</td>
        </tr>
        <tr>
            <th>Paramedik</th>
            <td>{{ $periksa->paramedik->id }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('periksa') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
