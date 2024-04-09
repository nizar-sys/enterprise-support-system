@extends('layouts.app')
@section('title', 'Tambah Data Halaman')

@section('title-header', 'Tambah Data Halaman')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('home-pages.index') }}">Data Halaman</a></div>
    <div class="breadcrumb-item active">Tambah Data Halaman</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Tambah Data Halaman</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('home-pages.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="matkul">Matkul</label>
                                    <input type="text" class="form-control @error('matkul') is-invalid @enderror"
                                        id="matkul" placeholder="Matkul" value="{{ old('matkul') }}"
                                        name="matkul">

                                    @error('matkul')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                    id="deskripsi" placeholder="Deskripsi"
                                    name="deskripsi" cols="30" rows="10">{{ old('deskripsi') }}</textarea>

                                    @error('deskripsi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('home-pages.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
