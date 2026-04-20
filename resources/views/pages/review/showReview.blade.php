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

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            {{-- HEADER --}}
            <div class="card-header bg-dark text-white py-2 text-center">
                <h6 class="mb-0 fw-semibold">Detail Informasi Destinasi Wisata</h6>
            </div>

            {{-- BODY --}}
            <div class="card-body p-3 bg-white">

                <h5 class="card-title
                    fw-bold text-dark">{{ $review->name }}</h5>
                    <p class="card-text">Destination: {{ $attractions->destination->nama ?? 'No destination available.' }}</p>
                <p class="card-text">{{ $attractions->description }}</p> 
                <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</div>  



@endsection\
