<x-layout>
    <x-slot:card_title>Paramedik</x-slot>
    <div class="mb-2">
        <a href="{{ route('paramedik.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Telpon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_paramedik as $paramedik)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $paramedik->nama }}</td>
                    <td>{{ $paramedik->tmp_lahir }}</td>
                    <td>{{ date('d F Y', strtotime($paramedik->tgl_lahir)) }}</td>
                    <td>{{ $paramedik->telpon }}</td>
                    <td>
                        <form action="{{ route('paramedik.destroy', $paramedik->id) }}" method="post">
                            <a href="{{ route('paramedik.view', $paramedik->id) }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('paramedik.edit', $paramedik->id) }}" class="btn btn-warning btn-sm"><i
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
