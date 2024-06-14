<x-layout>
    <x-slot:card_title>Kelurahan</x-slot>
    <div class="mb-2">
        <a href="{{ route('kelurahan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_kelurahan as $kelurahan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kelurahan->nama }}</td>
                    <td>
                        <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}" method="post">
                            <a href="{{ route('kelurahan.view', $kelurahan->id) }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('kelurahan.edit', $kelurahan->id) }}" class="btn btn-warning btn-sm"><i
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
