@extends('master')

@section('content')
<div style="
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://i.etsystatic.com/43771025/r/il/db5453/5018571357/il_fullxfull.5018571357_hfjs.jpg');
    background-size: cover;
    background-position: center;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding: 20px;">   

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white py-3 text-center">
                        <h5 class="mb-0 fw-semibold">Detail Review</h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-4 bg-white">
                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase small fw-bold mb-1">Attraction</h6>
                            <h4 class="fw-bold text-primary">{{ $reviews->attraction->name ?? 'N/A' }}</h4>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase small fw-bold mb-1">Reviewer</h6>
                            <p class="fs-5 mb-0"><i class="bi bi-person-circle me-2"></i>{{ $reviews->reviewer_name }}</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase small fw-bold mb-1">Komentar</h6>
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-warning italic">
                                <i class="bi bi-quote fs-4 text-warning"></i>
                                <p class="mb-0 fs-6">{{ $reviews->comment }}</p>
                            </div>
                        </div>

                        <div class="mb-4 text-end">
                            <small class="text-muted">Ditulis pada: {{ $reviews->created_at->format('d M Y, H:i') }}</small>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                ← Kembali
                            </a>
                            
                            <div>
                                <a href="{{ route('reviews.edit', $reviews->id) }}" class="btn btn-warning rounded-pill px-4 me-2">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endsection
