@extends('layouts.app')
@section('title', 'Tambah Data Alumni Peminatan ESS')

@section('title-header', 'Tambah Data Alumni Peminatan ESS')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('alumni.index') }}">Data Alumni Peminatan ESS</a></div>
    <div class="breadcrumb-item active">Tambah Data Alumni Peminatan ESS</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Tambah Data Alumni Peminatan ESS</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('alumni.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Alumni</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" placeholder="Nama Alumni" value="{{ old('nama') }}" name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email" value="{{ old('email') }}" name="email">

                                    @error('email')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                        id="no_telp" placeholder="Nomor Telepon" value="{{ old('no_telp') }}"
                                        name="no_telp">
                                    @error('no_telp')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                        id="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}"
                                        name="pekerjaan">

                                    @error('pekerjaan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="tahun_lulus">Tahun Lulus</label>
                                    <input type="date" class="form-control @error('tahun_lulus') is-invalid @enderror"
                                        id="tahun_lulus" placeholder="tahun_lulus" value="{{ old('tahun_lulus') }}"
                                        name="tahun_lulus">

                                    @error('status')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('alumni.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
