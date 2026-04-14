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
                        <h6 class="mb-0 fw-semibold">Tambah User</h6>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-3 bg-white">

                        <form action="/user/store" method="post">
                            @csrf
                            @method('POST')

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Nama User">
                                <label for="name">Nama User</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Email User">
                                <label for="email">Email User</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password User">
                                <label for="password">Password User</label>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between">
                                <a href="/user" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
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