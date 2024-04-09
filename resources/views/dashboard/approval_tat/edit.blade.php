@extends('layouts.app')
@section('title', 'Ubah Data Catatan Bimbingan TA')

@section('title-header', 'Ubah Data Catatan Bimbingan TA')
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('guidances.index') }}">Data Bimbingan TA</a></div>
    <div class="breadcrumb-item"><a href="{{ route('logbooks.index', $guidance->id) }}">Data Catatan Bimbingan TA</a></div>
    <div class="breadcrumb-item active">Ubah Data Catatan Bimbingan TA</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Formulir Ubah Data Catatan Bimbingan TA</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('logbooks.update', ['guidance' => $guidance->id, 'logbook' => $logbook->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="progres">Progres</label>
                                    <textarea class="form-control @error('progres') is-invalid @enderror"
                                    id="progres" placeholder="Progres Catatan Bimbingan TA"
                                    name="progres" cols="30" rows="10">{{ old('progres', $logbook->progres) }}</textarea>

                                    @error('progres')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="feedback">Feedback</label>
                                    <textarea class="form-control @error('feedback') is-invalid @enderror"
                                    id="feedback" placeholder="Feedback Catatan Bimbingan TA"
                                    name="feedback" cols="30" rows="10">{{ old('feedback', $logbook->feedback) }}</textarea>

                                    @error('feedback')
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
                                        id="status" placeholder="Status Catatan Bimbingan TA" value="{{ old('status', $logbook->status) }}"
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
                                <a href="{{ route('logbooks.index', $guidance->id) }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
