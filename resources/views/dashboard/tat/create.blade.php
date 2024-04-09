@extends('layouts.app')
@section('title', 'Tambah Data Tugas Akhir Terdahulu')

@section('title-header', 'Tambah Data Tugas Akhir Terdahulu')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('tat.index') }}">Data Tugas Akhir Terdahulu</a></div>
    <div class="breadcrumb-item active">Tambah Data Tugas Akhir Terdahulu</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Tambah Data Tugas Akhir Terdahulu</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tat.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" placeholder="Nama Data Tugas Akhir Terdahulu" value="{{ old('nama') }}"
                                        name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nim">NIM</label>
                                    <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                        id="nim" placeholder="NIM Data Tugas Akhir Terdahulu" value="{{ old('nim') }}"
                                        name="nim">

                                    @error('nim')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="surat_keterangan_lulus">Surat Keterangan Lulus</label>
                                    <input type="file" class="form-control @error('surat_keterangan_lulus') is-invalid @enderror"
                                        id="surat_keterangan_lulus" placeholder="Data Tugas Akhir Terdahulu" value="{{ old('surat_keterangan_lulus') }}"
                                        name="surat_keterangan_lulus">

                                    @error('surat_keterangan_lulus')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tugas_akhir">Tugas Akhir</label>
                                    <input type="file" class="form-control @error('tugas_akhir') is-invalid @enderror"
                                        id="tugas_akhir" placeholder="Data Tugas Akhir Terdahulu" value="{{ old('tugas_akhir') }}"
                                        name="tugas_akhir">

                                    @error('tugas_akhir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('tat.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
