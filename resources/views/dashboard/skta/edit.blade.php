@extends('layouts.app')
@section('title', 'Ubah SKTA')

@section('title-header', 'Ubah SKTA')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('skta.index') }}">SKTA</a></div>
    <div class="breadcrumb-item active">Ubah SKTA</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Ubah SKTA</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('skta.update', $skta->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" placeholder="Nama SKTA" value="{{ old('nama', $skta->nama) }}"
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
                                        id="nim" placeholder="NIM SKTA" value="{{ old('nim', $skta->nim) }}"
                                        name="nim">

                                    @error('nim')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="surat">Surat</label>
                                    <input type="file" class="form-control @error('surat') is-invalid @enderror"
                                        id="surat" placeholder="SKTA" value="{{ old('surat', $skta->surat) }}"
                                        name="surat">

                                    @error('surat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('skta.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
