@extends('master')

@section('content')

<div style="background: linear-gradient(135deg, #919192, #0a0a0a); min-height:100vh; padding:30px 0;">

    <div class="container">

        <div class="card border-0 shadow rounded-4 overflow-hidden">

            {{-- HEADER --}}
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-2">

                <div class="d-flex align-items-center gap-2">
                    <a href="/destination/create" 
                       class="btn btn-light btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add
                    </a>

                    <h6 class="mb-0 fw-semibold">Destinasi Wisata</h6>
                </div>

                <span class="badge bg-light text-dark px-2 py-1 small">
                    {{ $destinations->total() }}
                </span>
            </div>

            {{-- BODY --}}
            <div class="card-body bg-white p-3">

                {{-- ALERT --}}
                @if(session('success'))
                    <div id="successAlert" class="alert alert-success py-2 px-3 small d-flex justify-content-between align-items-center mb-2">
                        <span><i class="bi bi-check-circle me-1"></i> {{ session('success') }}</span>
                        <button type="button" class="btn-close btn-sm" onclick="this.parentElement.remove()"></button>
                    </div>
                @endif

                {{-- SEARCH --}}
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0">List</h6>

                    <form action="/destination" method="get" style="max-width:220px;">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>  
                    </form>
                </div>

                {{-- TABLE --}}
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0">

                        <thead class="table-light text-center small">
                            <tr class="text-secondary">
                                <th style="width:4%;">No</th>
                                <th>Nama</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Days</th>
                                <th>Hours</th>
                                <th class="text-end">Price</th>
                                <th style="width:12%;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="small">
                            @forelse($destinations as $destination)
                            <tr>

                                <td class="text-center text-muted">
                                    {{ ($destinations->currentPage() - 1) * $destinations->perPage() + $loop->iteration }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $destination->nama }}
                                </td>

                                <td class="text-muted text-truncate" style="max-width:160px;">
                                    {{ $destination->description }}
                                </td>

                                <td>
                                    <span class="badge bg-light border text-dark small d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-geo-alt-fill text-danger"></i>
                                        {{ $destination->location }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-success-subtle text-success small px-2">
                                        {{ $destination->working_days }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-info-subtle text-info small px-2">
                                        {{ $destination->working_hours }}
                                    </span>
                                </td>

                                <td class="text-end fw-semibold">
                                    Rp {{ number_format($destination->ticket_price, 0, ',', '.') }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">

                                        <a href="/destinasi1/{{ $destination->id }}" 
                                           class="btn btn-outline-primary btn-sm px-2 py-1">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="/destination/{{ $destination->id }}/edit" 
                                           class="btn btn-outline-warning btn-sm px-2 py-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="/destination/{{ $destination->id }}" 
                                              method="post"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" 
                                                    class="btn btn-outline-danger btn-sm px-2 py-1">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted small">
                                    Belum ada data
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                {{-- PAGINATION PREMIUM --}}
                <div class="d-flex justify-content-between align-items-center mt-3">

                    <div class="small text-muted">
                        Menampilkan 
                        {{ $destinations->firstItem() }} 
                        - 
                        {{ $destinations->lastItem() }} 
                        dari 
                        {{ $destinations->total() }} data
                    </div>

                    <div class="custom-pagination">
                        {{ $destinations->links('pagination::bootstrap-5') }}
                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer text-center text-muted small py-2">
                Sistem Informasi Destinasi Wisata • 2026
            </div>

        </div>

    </div>

</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .table td, .table th {
        padding: 6px 8px !important;
    }

    .table tbody tr {
        line-height: 1.2;
    }

    .badge {
        font-size: 0.7rem;
    }

    .btn-light:hover {
        transform: translateY(-1px);
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
        transform: scale(1.05);
        transition: 0.2s;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: black;
    }

    /* PAGINATION PREMIUM */
    .custom-pagination nav {
        display: flex;
    }

    .custom-pagination .pagination {
        margin-bottom: 0;
        gap: 4px;
    }

    .custom-pagination .page-link {
        border-radius: 8px !important;
        border: none;
        color: #333;
        padding: 6px 12px;
        font-size: 0.8rem;
        transition: 0.2s;
    }

    .custom-pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #0d6efd, #4e73df);
        color: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .custom-pagination .page-link:hover {
        background-color: #f1f1f1;
        transform: translateY(-1px);
    }

    .custom-pagination .page-item.disabled .page-link {
        background-color: #e9ecef;
        color: #aaa;
    }
</style>

<script>
    setTimeout(() => {
        let alert = document.getElementById('successAlert');
        if(alert){
            alert.style.transition = "0.4s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 400);
        }
    }, 2500);
</script>

@endsection