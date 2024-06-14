<x-layout>
    <x-slot:card_title>Pasien</x-slot>
    <div class="mb-2">
        <a href="{{ route('pasien.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pasien</th>
                <th>Nama Pasien</th>
                <th>Tanggal Lahir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_pasien as $pasien)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pasien->kode }}</td>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->tgl_lahir }}</td>
                    <td>
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post">
                            <a href="{{ route('pasien.view', $pasien->id) }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script>
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        </script>
    @endpush
</x-layout>
