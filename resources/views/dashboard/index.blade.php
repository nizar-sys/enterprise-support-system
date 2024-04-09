@extends('layouts.app')
@section('title', 'Dashboard')
@php
    $auth = Auth::user();
@endphp

@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
@endsection


@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header hero-text">
                    <h5>About ESS !</h5>
                </div>
                <div class="card-body">
                    Enterprises System and Solution (ESS) merupakan peminatan yang melakukan kajian mengenai sistem yang
                    terintegrasi dengan berbasis pada pengetahuan dan teknologi informasi yang mendukung organisasi
                    dalam
                    menciptakan nilai dan kebaruan, baik pada produk ataupun sistem.
                    Objek penelitian dari aktivitas riset pada Laboratorium ESS meliputi enterprises system, mulai dari
                    perusahaan yang berskala mikro, kecil, menengah atau pun besar

                </div>
            </div>
        </div>
    </div>

    @if (count($matkuls) > 0)
        <div class="card card-danger">
            <h1 class="hero-text">Mata Kuliah Peminatan Pada ESS</h1>
        </div>
        <div class="row">
            @foreach ($matkuls as $item)
                <div class="col-sm-12 col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <h5 class="card-title normal-text">{{ $item->matkul }}</h5>
                            <p class="card-text">{{$item->deskripsi}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
