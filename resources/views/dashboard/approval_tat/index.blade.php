@extends('layouts.app')
@section('title', 'Data Approval Tugas Akhir Terdahulu')

@section('title-header', 'Data Approval Tugas Akhir Terdahulu')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('tat.index') }}">Data Tugas Akhir Terdahulu</a></div>
    <div class="breadcrumb-item active">Data Approval Tugas Akhir Terdahulu</div>
@endsection

@push('action_btn')
    <a href="{{ route('approval-tat.create', $tat->id) }}" class="btn btn-primary">Tambah Data</a>
    <a href="{{ route('tat.index') }}" class="btn btn-secondary">Kembali</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Approval Tugas Akhir Terdahulu</h4>
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
                                    <th>ID Tugas Akhir</th>
                                    <th>Tahun Lulus</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($approvalTat as $approval)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $approval->tat->id }}</td>
                                        <td>{{ $approval->tahun_lulus }}</td>
                                        <td>{{ $approval->email }}</td>
                                        <td>{{ $approval->telepon }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('approval-tat.edit', ['tat' => $tat->id, 'approval_tat' => $approval->id]) }}" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $approval->id }}"
                                                action="{{ route('approval-tat.destroy', ['tat' => $tat->id, 'approval_tat' => $approval->id]) }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $approval->id }}')"
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
