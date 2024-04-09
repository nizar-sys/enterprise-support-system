@extends('layouts.app')
@section('title', 'Data Catatan Bimbingan TA')

@section('title-header', 'Data Catatan Bimbingan TA')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('guidances.index') }}">Data Bimbingan TA</a></div>
    <div class="breadcrumb-item active">Data Catatan Bimbingan TA</div>
@endsection

@push('action_btn')
    <a href="{{ route('logbooks.create', $guidance->id) }}" class="btn btn-primary">Tambah Data</a>
    <a href="{{ route('guidances.index') }}" class="btn btn-secondary">Kembali</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Catatan Bimbingan TA</h4>
                    <div class="card-header-action">
                        @stack('action_btn')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="table-data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Progres</th>
                                    <th>Status</th>
                                    <th>Feedback</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logbooks as $logbook)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ asset('/uploads/files/' . $logbook->progres) }}" target="_blank" rel="noopener noreferrer">{{ $logbook->progres }}</a></td>
                                        <td>{{ $logbook->status }}</td>
                                        <td>{{ $logbook->feedback }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('logbooks.edit', ['guidance' => $guidance->id, 'logbook' => $logbook->id]) }}" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $logbook->id }}"
                                                action="{{ route('logbooks.destroy', ['guidance' => $guidance->id, 'logbook' => $logbook->id]) }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $logbook->id }}')"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id) {
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }

        var tabledata = $('#table-data').DataTable({
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari Data",
                lengthMenu: "Menampilkan _MENU_ data",
                zeroRecords: "Data tidak ditemukan",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ data)",
                paginate: {
                    previous: '<i class="fa fa-angle-left"></i>',
                    next: "<i class='fa fa-angle-right'></i>",
                }
            },
            dom: 'Bflrtip',
            buttons: [{
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-danger',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                },
            }, ],
        });
    </script>
@endsection
