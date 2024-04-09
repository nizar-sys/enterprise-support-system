@extends('layouts.app')
@section('title', 'Profile (' . $user->name . ')')

@section('breadcrumb')
    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ route('profile') }}">Profile</a>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button onclick="$('#form-update-prof').submit()" title="Save Changes"
                                class="btn btn-primary"><span class="fas fa-save"></span></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-update-prof" action="{{ route('change-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">Username</label>
                                        <input type="text" id="input-name"
                                            class="form-control @error('name')
                                        is-invalid
                                        @enderror"
                                            placeholder="Username" onkeyup="regSpace(this.value)" name="name"
                                            value="{{ $user->name }}">

                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" id="input-email"
                                            class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                            placeholder="Email@example" value="{{ $user->email }}" name="email">
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="password">Katasandi Baru</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" placeholder="Katasandi Akun" name="password">

                                        @error('password')
                                            <div class="d-block invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="d-block invalid-feedback">Jangan isi kolom jika tidak ingin merubah
                                            katasandi akun.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('#avaImage').on('click', function() {
            event.preventDefault();

            $('input[name="image"]').click()
        })

        function bacaGambar(input) {
            try {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#avaImage').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);

                    Swal.fire({
                        title: 'Lanjutkan pasang foto profile?',
                        text: "Jadikan gambar sebagai foto profile",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya!',
                        cancelButtonText: 'Batalkan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#form-upload').submit()
                        } else {
                            $('#avaImage').attr('src', '/uploads/images/' + $('input[name="oldImage"]').val());
                        }
                    })
                }
            } catch (error) {

                Snackbar.show({
                    text: 'Error ' + error,
                    duration: 4000,
                });
                window.location.reload()
            }
        }

        $('input[name="image"]').change(function() {
            bacaGambar(this);
        });

        function regSpace(str) {
            str = str.replace(/\s+/g, '-');
            return $('input[name="name"]').val(str)
        }
    </script>
@endsection
