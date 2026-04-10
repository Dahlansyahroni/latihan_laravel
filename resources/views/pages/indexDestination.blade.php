@extends('master')

@section('content')

{{-- BACKGROUND --}}
<div style="background: linear-gradient(135deg, #4e73df, #1cc88a); min-height:100vh; padding:40px 0;">

    <div class="container">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4 text-white">

            <div class="d-flex align-items-center gap-2">
                <a href="/destination/create" 
                   class="btn btn-light btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Add
                </a>

                <h4 class="mb-0 fw-semibold">Daftar Destinasi Wisata</h4>
            </div>

            <span class="badge bg-light text-dark px-3 py-2">
                Total: {{ $destinations->count() }}
            </span>

        </div>

        {{-- TABLE CONTAINER --}}
        <div class="bg-white rounded-4 shadow-lg p-3">

            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    
                    <thead style="background-color:#f8f9fa;">
                        <tr class="text-center text-secondary">
                            <th style="width:5%;">No</th>
                            <th>Nama</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Working Days</th>
                            <th>Working Hours</th>
                            <th class="text-end">Ticket Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($destinations as $destination)
                        <tr class="border-bottom">
                            <td class="text-center fw-semibold text-muted">
                                {{ $loop->iteration }}
                            </td>

                            <td class="fw-semibold text-dark">
                                {{ $destination->nama }}
                            </td>

                            <td class="text-muted" style="max-width:250px;">
                                {{ $destination->description }}
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $destination->location }}
                                </span>
                            </td>

                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success px-3 py-2">
                                    {{ $destination->working_days }}
                                </span>
                            </td>

                            <td class="text-center">
                                <span class="badge bg-info-subtle text-info px-3 py-2">
                                    {{ $destination->working_hours }}
                                </span>
                            </td>

                            <td class="text-end fw-bold">
                                {{ $destination->ticket_price }}
                            </td>

                            <td class="text-center">
    <div class="d-flex justify-content-center gap-2">

        <a href="/destinasi1/{{ $destination->id }}" 
           class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-eye"></i>
        </a>
        <a href="/destination/{{ $destination->id }}/edit" 
           class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-pencil"></i>
        </a>

        <form action="/destination/{{ $destination->id }}" 
              method="post"
              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')

            <button type="submit" 
                    class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold">
                <i class="bi bi-trash"></i>
            </button>
        </form>

    </div>
</td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <h6 class="mb-1">Belum ada data</h6>
                                <small>Silakan tambahkan destinasi terlebih dahulu</small>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

        {{-- FOOTER --}}
        <div class="text-center text-white mt-4 small">
            Sistem Informasi Destinasi Wisata • 2026
        </div>

    </div>

</div>

{{-- ICON --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

{{-- STYLE --}}
<style>
    .btn-light:hover {
        transform: translateY(-2px);
        transition: 0.2s;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
        transform: scale(1.05);
        transition: 0.2s;
    }
</style>

@endsection