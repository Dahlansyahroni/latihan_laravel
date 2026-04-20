@extends('master')

@section('content')

<div style="background: linear-gradient(135deg, #4e73df, #1cc88a); min-height:100vh; padding:50px 0;">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="bg-white rounded-4 shadow-lg p-5">
                    <img src="{{ asset('storage/image/'. $destination->image) }}" alt="{{ $destination->name}}" class="img-fluid">

                    {{-- TITLE --}}
                    <div class="mb-4 text-center">
                        <h2 class="fw-bold text-dark">{{ $destination->nama }}</h2>
                        <p class="text-muted mb-0">Detail Informasi Destinasi Wisata</p>
                    </div>

                    <hr>

                    {{-- DESCRIPTION --}}
                    <div class="mb-4">
                        <h6 class="text-secondary">Description</h6>
                        <p class="text-muted">
                            {{ $destination->description }}
                        </p>
                    </div>

                    {{-- INFO GRID --}}
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <small class="text-muted">Location</small>
                                <div class="fw-semibold">{{ $destination->location }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <small class="text-muted">Working Days</small>
                                <div class="fw-semibold">{{ $destination->working_days }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <small class="text-muted">Working Hours</small>
                                <div class="fw-semibold">{{ $destination->working_hours }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <small class="text-muted">Ticket Price</small>
                                <div class="fw-bold text-dark">
                                    {{ $destination->ticket_price }}
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-5 text-center">
                        <a href="/destinations" 
                           class="btn btn-primary rounded-pill px-4 shadow-sm">
                            ← Kembali
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

{{-- STYLE --}}
<style>
    .btn-primary:hover {
        transform: translateY(-2px);
        transition: 0.2s;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
</style>

@endsection