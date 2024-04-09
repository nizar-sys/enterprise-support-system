@extends('layouts.app')
@section('title', 'Data Tugas Akhir Terdahulu')

@section('title-header', 'Data Tugas Akhir Terdahulu')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item active">Data Tugas Akhir Terdahulu</div>
@endsection

@if (!in_array(Auth::user()->role, ['pembina', 'dosen']))
    @push('action_btn')
        <a href="{{ route('tat.create') }}" class="btn btn-primary">Tambah Data</a>
    @endpush
@endif

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Tugas Akhir Terdahulu</h4>
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
                                    <th>NIM</th>
                                    <th>Tugas Akhir</th>
                                    <th>Surat Keterangan Lulus</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tat as $ta)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ta->nama }}</td>
                                        <td>{{ $ta->nim }}</td>
                                        <td><a href="{{ asset('/uploads/files/' . $ta->surat_keterangan_lulus) }}"
                                                target="_blank"
                                                rel="noopener noreferrer">{{ $ta->surat_keterangan_lulus }}</a></td>
                                        <td><a href="{{ asset('/uploads/files/' . $ta->tugas_akhir) }}" target="_blank"
                                                rel="noopener noreferrer">{{ $ta->tugas_akhir }}</a></td>
                                        <td class="d-flex jutify-content-center">
                                            {{-- <a href="{{ route('approval-tat.index', $ta->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a> --}}
                                            @if (!in_array(Auth::user()->role, ['pembina', 'dosen']))
                                                <a href="{{ route('tat.edit', $ta->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <form id="delete-form-{{ $ta->id }}"
                                                    action="{{ route('tat.destroy', $ta->id) }}" class="d-none"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button onclick="deleteForm('{{ $ta->id }}')"
                                                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            @endif
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
                    columns: [0, 1, 2, 3, 4]
                },
            }, ],
        });
    </script>
@endsection
