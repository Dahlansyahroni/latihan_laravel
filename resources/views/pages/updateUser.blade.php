@extends('master')

@section('content')
<div style="background: linear-gradient(135deg, #f4f5f7, #80d7e2); min-height:100vh; padding:30px 0;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-warning text-dark py-2 text-center">
                        <h6 class="mb-0 fw-semibold">Update User</h6>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-3 bg-white">

                        <form action="/user/{{$users->id}}/update" method="post">
                            @csrf
                            @method('POST')

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Nama User" value="{{$users->name}}">
                                <label for="name">Nama User</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Email User" value="{{$users->email}}  ">
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

@endsection