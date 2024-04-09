@extends('layouts.app')
@section('title', 'Tambah Data Kelengkapan Tugas Akhir')

@section('title-header', 'Tambah Data Kelengkapan Tugas Akhir')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('completeness.index') }}">Data Kelengkapan Tugas Akhir</a></div>
    <div class="breadcrumb-item active">Tambah Data Kelengkapan Tugas Akhir</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Tambah Data Kelengkapan Tugas Akhir</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('completeness.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" placeholder="Nama Kelengkapan Tugas Akhir" value="{{ old('nama') }}"
                                        name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="khs">KHS</label>
                                    <input type="file" class="form-control @error('khs') is-invalid @enderror"
                                        id="khs" placeholder="KHS Kelengkapan Tugas Akhir" value="{{ old('khs') }}"
                                        name="khs">

                                    @error('khs')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="eprt">EPRT</label>
                                    <input type="file" class="form-control @error('eprt') is-invalid @enderror"
                                        id="eprt" placeholder="EPRT Kelengkapan Tugas Akhir" value="{{ old('eprt') }}"
                                        name="eprt">

                                    @error('eprt')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('completeness.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
