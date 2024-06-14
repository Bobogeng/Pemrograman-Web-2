<x-layout>
    <x-slot:card_title>Periksa</x-slot>
    <div class="mb-2">
        <a href="{{ route('periksa.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Tensi</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_periksa as $periksa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $periksa->tanggal }}</td>
                    <td>{{ $periksa->tensi }}</td>
                    <td>{{ $periksa->keterangan }}</td>
                    <td>
                        <form action="{{ route('periksa.destroy', $periksa->id) }}" method="post">
                            <a href="{{ route('periksa.view', $periksa->id) }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('periksa.edit', $periksa->id) }}" class="btn btn-warning btn-sm"><i
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
