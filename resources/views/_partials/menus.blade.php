@php
    $roleUser = Auth::user()->role;
@endphp

<li class="menu-header">Home Page</li>
<li class="{{ Route::is('home') ? 'active' : '' }}">
    <a href="{{ route('home', []) }}" class="nav-link"><i class="fas fa-fire"></i><span>Home Page</span></a>
</li>

<li class="menu-header">Master Data</li>
@if ($roleUser == 'admin')
    <li class="{{ Route::is('home-pages.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home-pages.index') }}"><i class="fas fa-home"></i> <span>Data Halaman</span></a>
    </li>
    <li class="{{ Route::is('users.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Data Pengguna</span></a>
    </li>
@endif
<li class="{{ Route::is('lecturers.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('lecturers.index') }}"><i class="fas fa-users"></i> <span>Data Dosen</span></a>
</li>
<li class="{{ Route::is('topics.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('topics.index') }}"><i class="fas fa-building"></i> <span>Data Topik Tugas <br>
            Akhir</span></a>
</li>
<li class="{{ Route::is('alumni.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('alumni.index') }}"><i class="fas fa-building"></i> <span>Data Alumni Peminatan ESS</a>
</li>

<li class="menu-header">Manajemen Bimbingan</li>
<li class="{{ Route::is('schedules.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('schedules.index') }}"><i class="fas fa-calendar-alt"></i> <span>Data Jadwal
            Bimbingan TA</span></a>
</li>
<li class="{{ Route::is('guidances.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('guidances.index') }}"><i class="fas fa-users"></i> <span>Data Bimbingan
            TA</span></a>
</li>

<li class="menu-header">Manajemen Tugas Akhir</li>
<li class="{{ Route::is('completeness.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('completeness.index') }}"><i class="fas fa-file"></i> <span>Data Kelengkapan
            TA</span></a>
</li>
<li class="{{ Route::is('skta.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('skta.index') }}"><i class="fas fa-file"></i> <span>SKTA</span></a>
</li>
<li class="{{ Route::is('tat.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tat.index') }}"><i class="fas fa-file"></i> <span>Data TA Terdahulu</span></a>
</li>
{{-- <li class="{{ Route::is('projects.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-building"></i> <span>Data Tugas
            Akhir</span></a>
</li> --}}

<li class="menu-header">Settings</li>
<li class="{{ Route::is('profile') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('profile') }}"><i class="fas fa-user"></i> <span>Profile</span></a>
</li>
