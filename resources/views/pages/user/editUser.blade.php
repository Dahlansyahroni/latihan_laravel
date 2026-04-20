@extends('master')

@section('content')
<div style="
    background: url('https://i.etsystatic.com/43771025/r/il/db5453/5018571357/il_fullxfull.5018571357_hfjs.jpg');
    background-size: cover;
    background-position: center;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white py-2 text-center">
                        <h6 class="mb-0 fw-semibold">Edit User</h6>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 border-0 shadow-sm mb-3">
                            <div class="fw-semibold mb-1">Terjadi kesalahan:</div>
                            <ul class="mb-0 ps-3 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    


                    {{-- BODY --}}
                    <div class="card-body p-3 bg-white">

                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$user->name}}">
                                <label>Nama User</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{$user->email}}">
                                <label>Email User</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control form-control-sm" id="password" name="password">
                                <label>Password User</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                                    ← Kembali
                                </a>
                                <button type="submit" class="btn btn-primary btn-sm rounded-pill px-3">
                                    Simpan
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection