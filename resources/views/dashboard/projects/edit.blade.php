@extends('layouts.app')
@section('title', 'Ubah Data Tugas Akhir')

@section('title-header', 'Ubah Data Tugas Akhir')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('projects.index') }}">Data Tugas Akhir</a></div>
    <div class="breadcrumb-item active">Ubah Data Tugas Akhir</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Ubah Data Tugas Akhir</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('projects.update', $project->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="dosen_id">Dosen</label>
                                    <select class="form-control @error('dosen_id') is-invalid @enderror" id="dosen_id"
                                        name="dosen_id">
                                        <option value="" selected>Pilih Dosen</option>
                                        @foreach ($lecturers as $dosen)
                                            <option value="{{ $dosen->id }}"
                                                @if (old('dosen_id', $project->dosen_id) == $dosen->id) selected @endif>
                                                {{ $dosen->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('dosen_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="topik_id">Topik</label>
                                    <select class="form-control @error('topik_id') is-invalid @enderror" id="topik_id"
                                        name="topik_id">
                                        <option value="" selected>Pilih Topik</option>
                                        @foreach ($topics as $topic)
                                            <option value="{{ $topic->id }}"
                                                @if (old('topik_id', $project->topik_id) == $topic->id) selected @endif>
                                                {{ $topic->judul }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('topik_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="bimbingan_id">Bimbingan</label>
                                    <select class="form-control @error('bimbingan_id') is-invalid @enderror" id="bimbingan_id"
                                        name="bimbingan_id">
                                        <option value="" selected>Pilih Bimbingan</option>
                                        @foreach ($guidances as $guidance)
                                            <option value="{{ $guidance->id }}"
                                                @if (old('bimbingan_id', $project->bimbingan_id) == $guidance->id) selected @endif>
                                                {{ $guidance->dosen->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('bimbingan_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kelengkapan_id">Data Kelengkapan</label>
                                    <select class="form-control @error('kelengkapan_id') is-invalid @enderror" id="kelengkapan_id"
                                        name="kelengkapan_id">
                                        <option value="" selected>Pilih Data Kelengkapan</option>
                                        @foreach ($completeness as $completen)
                                            <option value="{{ $completen->id }}"
                                                @if (old('kelengkapan_id', $project->kelengkapan_id) == $completen->id) selected @endif>
                                                {{ $completen->khs }}, {{ $completen->eprt }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('kelengkapan_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="skta_id">Surat Kelengkapan</label>
                                    <select class="form-control @error('skta_id') is-invalid @enderror" id="skta_id"
                                        name="skta_id">
                                        <option value="" selected>Pilih Surat Kelengkapan</option>
                                        @foreach ($skta as $sk)
                                            <option value="{{ $sk->id }}"
                                                @if (old('skta_id', $project->skta_id) == $sk->id) selected @endif>
                                                {{ $sk->surat }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('skta_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tat_id">Tugas Akhir Terdahulu</label>
                                    <select class="form-control @error('tat_id') is-invalid @enderror" id="tat_id"
                                        name="tat_id">
                                        <option value="" selected>Pilih Tugas Akhir Terdahulu</option>
                                        @foreach ($tat as $ta)
                                            <option value="{{ $ta->id }}"
                                                @if (old('tat', $project->tat_id) == $ta->id) selected @endif>
                                                {{ $ta->tugas_akhir }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('tat_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
