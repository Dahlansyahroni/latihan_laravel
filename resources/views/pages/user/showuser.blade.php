@extends('master')

@section('content')
<div style="
    background: url('https://i.etsystatic.com/43771025/r/il/db5453/5018571357/il_fullxfull.5018571357_hfjs.jpg');
    background-size: cover;
    background-position: center;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;">  

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white py-2 text-center">
                        <h6 class="mb-0 fw-semibold">Detail User</h6>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-3 bg-white">

                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">{{$user->email}}</p>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                            ← Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection