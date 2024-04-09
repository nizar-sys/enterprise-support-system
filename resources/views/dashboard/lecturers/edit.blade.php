@extends('layouts.app')
@section('title', 'Ubah Data Dosen')

@section('title-header', 'Ubah Data Dosen')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('lecturers.index') }}">Data Dosen</a></div>
    <div class="breadcrumb-item active">Ubah Data Dosen</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>Formulir Ubah Data Dosen</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('lecturers.update', $lecturer->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kode_dosen">Kode Dosen</label>
                                    <input type="text" class="form-control @error('kode_dosen') is-invalid @enderror"
                                        id="kode_dosen" placeholder="Kode Dosen" value="{{ old('kode_dosen', $lecturer->kode_dosen) }}"
                                        name="kode_dosen">

                                    @error('kode_dosen')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" placeholder="Nama Dosen" value="{{ old('nama', $lecturer->nama) }}"
                                        name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nip">NIP Dosen</label>
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                        id="nip" placeholder="NIP Dosen" value="{{ old('nip', $lecturer->nip) }}"
                                        name="nip">

                                    @error('nip')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Dosen" value="{{ old('email', $lecturer->email) }}"
                                        name="email">

                                    @error('email')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="telepon">NO Telepon Dosen</label>
                                    <input type="number" class="form-control @error('telepon') is-invalid @enderror"
                                        id="telepon" placeholder="NO Telepon Dosen" value="{{ old('telepon', $lecturer->telepon) }}"
                                        name="telepon">

                                    @error('telepon')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('lecturers.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
