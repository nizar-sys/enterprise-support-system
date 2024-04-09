@extends('layouts.app')
@section('title', 'Tambah Data Topik Tugas Akhir')

@section('title-header', 'Tambah Data Topik Tugas Akhir')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('topics.index') }}">Data Topik Tugas Akhir</a></div>
    <div class="breadcrumb-item active">Tambah Data Topik Tugas Akhir</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Tambah Data Topik Tugas Akhir</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('topics.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judul" placeholder="Judul Topik Tugas Akhir" value="{{ old('judul') }}"
                                        name="judul">

                                    @error('judul')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kouta">Kuota</label>
                                    <input type="number" class="form-control @error('kouta') is-invalid @enderror"
                                        id="kouta" placeholder="Kuota Topik Tugas Akhir" value="{{ old('kouta') }}"
                                        name="kouta">

                                    @error('kouta')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="objek">Objek</label>
                                    <input type="text" class="form-control @error('objek') is-invalid @enderror"
                                        id="objek" placeholder="Objek Topik Tugas Akhir" value="{{ old('objek') }}"
                                        name="objek">

                                    @error('objek')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="publisher">Pengusul</label>
                                    <input type="text" class="form-control @error('publisher') is-invalid @enderror"
                                        id="publisher" placeholder="Pengusul Topik Tugas Akhir" value="{{ old('publisher') }}"
                                        name="publisher">

                                    @error('publisher')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('topics.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
