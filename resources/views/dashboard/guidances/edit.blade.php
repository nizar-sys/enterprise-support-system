@extends('layouts.app')
@section('title', 'Ubah Data Bimbingan TA')

@section('title-header', 'Ubah Data Bimbingan TA')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('guidances.index') }}">Data Bimbingan TA</a></div>
    <div class="breadcrumb-item active">Ubah Data Bimbingan TA</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Ubah Data Bimbingan TA</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('guidances.update', $guidance->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jadwal_id">Jadwal</label>
                                    <select class="form-control @error('jadwal_id') is-invalid @enderror" id="jadwal_id"
                                        name="jadwal_id">
                                        <option value="" selected>---Jadwal---</option>
                                        @foreach ($schedules as $jadwal)
                                            <option value="{{ $jadwal->id }}"
                                                @if (old('jadwal_id', $guidance->jadwal_id) == $jadwal->id) selected @endif>
                                                {{ $jadwal->nama }} | {{ $jadwal->tanggal }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('jadwal_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="dosen_id">Dosen Pembimbing</label>
                                    <select class="form-control @error('dosen_id') is-invalid @enderror" id="dosen_id"
                                        name="dosen_id">
                                        <option value="" selected>---Dosen Pembimbing---</option>
                                        @foreach ($lecturers as $lecturer)
                                            <option value="{{ $lecturer->id }}"
                                                @if (old('dosen_id', $guidance->dosen_id) == $lecturer->id) selected @endif>
                                                {{ $lecturer->kode_dosen }} | {{ $lecturer->nip }} | {{ $lecturer->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('dosen_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nim">NIM</label>
                                    <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                        id="nim" placeholder="NIM Mahasiswa" value="{{ old('nim', $guidance->nim) }}"
                                        name="nim">

                                    @error('nim')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_mahasiswa">Nama</label>
                                    <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                        id="nama_mahasiswa" placeholder="Nama Mahasiswa" value="{{ old('nama_mahasiswa', $guidance->nama_mahasiswa) }}"
                                        name="nama_mahasiswa">

                                    @error('nama_mahasiswa')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control @error('status') is-invalid @enderror"
                                        id="status" placeholder="Status Bimbingan TA, eg: Revisi Bab 1" value="{{ old('status', $guidance->status) }}"
                                        name="status">

                                    @error('status')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('guidances.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
