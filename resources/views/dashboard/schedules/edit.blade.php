@extends('layouts.app')
@section('title', 'Ubah Data Jadwal Bimbingan TA')

@section('title-header', 'Ubah Data Jadwal Bimbingan TA')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('schedules.index') }}">Data Jadwal Bimbingan TA</a></div>
    <div class="breadcrumb-item active">Ubah Data Jadwal Bimbingan TA</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>Formulir Ubah Data Jadwal Bimbingan TA</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" placeholder="Nama Jadwal Bimbingan TA" value="{{ old('nama', $schedule->nama) }}"
                                        name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="tanggal" placeholder="Tanggal Jadwal Bimbingan TA" value="{{ old('tanggal', $schedule->tanggal) }}"
                                        name="tanggal">

                                    @error('tanggal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('schedules.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
