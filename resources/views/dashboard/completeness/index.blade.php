@extends('layouts.app')
@section('title', 'Data Kelengkapan Tugas Akhir')

@section('title-header', 'Data Kelengkapan Tugas Akhir')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item active">Data Kelengkapan Tugas Akhir</div>
@endsection

@if (!in_array(Auth::user()->role, ['pembina', 'dosen']))
    @push('action_btn')
        <a href="{{ route('completeness.create') }}" class="btn btn-primary">Tambah Data</a>
    @endpush
@endif

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Kelengkapan Tugas Akhir</h4>
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
                                    <th>Nama</th>
                                    <th>KHS</th>
                                    <th>EPRT</th>
                                    @if (!in_array(Auth::user()->role, ['pembina', 'dosen']))
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($completeness as $completen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $completen->nama }}</td>
                                        <td><a href="{{ asset('/uploads/files/' . $completen->khs) }}" target="_blank"
                                                rel="noopener noreferrer">{{ $completen->khs }}</a></td>
                                        <td><a href="{{ asset('/uploads/files/' . $completen->eprt) }}" target="_blank"
                                                rel="noopener noreferrer">{{ $completen->eprt }}</a></td>
                                        @if (!in_array(Auth::user()->role, ['pembina', 'dosen']))
                                            <td class="d-flex jutify-content-center">
                                                <a href="{{ route('completeness.edit', $completen->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <form id="delete-form-{{ $completen->id }}"
                                                    action="{{ route('completeness.destroy', $completen->id) }}"
                                                    class="d-none" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button onclick="deleteForm('{{ $completen->id }}')"
                                                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        @endif
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
                    columns: [0, 1, 2, 3]
                },
            }, ],
        });
    </script>
@endsection
