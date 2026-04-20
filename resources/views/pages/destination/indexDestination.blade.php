@extends('master')

@section('content')
<div class="min-vh-100 py-5" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 45%, #334155 100%);">
    <div class="container">

        <div class="card border-0 shadow-lg rounded-5 overflow-hidden glass-card">

            {{-- HEADER --}}
            <div class="card-header border-0 px-4 py-4 header-gradient text-white">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">

                    <div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">Destinasi Wisata</h3>
                                <small class="text-light opacity-75">
                                    Kelola seluruh data destinasi wisata dengan tampilan modern
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <div class="text-end d-none d-md-block">
                            <div class="small text-light opacity-75">Total Data</div>
                            <div class="fs-4 fw-bold">{{ $destinations->total() }}</div>
                        </div>

                        <a href="/destinations/create" class="btn btn-light rounded-pill px-4 py-2 fw-semibold shadow-sm add-btn">
                            <i class="bi bi-plus-circle-fill me-2"></i>
                            Tambah Destinasi
                        </a>
                    </div>
                </div>
            </div>

            </div>

        {{-- LIST / TABLE OUTSIDE HEADER CARD --}}
        <div class="card border-0 shadow-lg rounded-5 overflow-hidden glass-card mt-4">
            {{-- BODY --}}
            <div class="card-body bg-white p-4">

                {{-- ALERT --}}
                @if(session('success'))
                    <div id="successAlert" class="alert alert-success border-0 rounded-4 shadow-sm d-flex align-items-center justify-content-between px-4 py-3 mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill fs-5"></i>
                            <span class="fw-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                {{-- TOP BAR --}}
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 text-dark">Daftar Destinasi</h5>
                        <p class="text-muted small mb-0">
                            Menampilkan data destinasi wisata yang tersedia
                        </p>
                    </div>

                    <form action="{{ route('destinations.index') }}" method="GET" class="search-box">
                        <div class="input-group shadow-sm rounded-pill overflow-hidden">
                            <span class="input-group-text bg-white border-0 px-3">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input
                                type="text"
                                name="search"
                                class="form-control border-0 py-2 px-0"
                                placeholder="Cari destinasi..."
                                value="{{ request('search') }}"
                            >
                            <button class="btn btn-primary px-4 border-0" type="submit">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                {{-- TABLE --}}
                <div class="table-responsive rounded-4 border overflow-hidden">
                    <table class="table align-middle mb-0 custom-table">
                        <thead>
                            <tr>
                                <th style="width: 70px">#</th>
                                <th>Gambar</th>
                                <th>Destinasi</th>
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th class="text-end">Harga</th>
                                <th class="text-center" style="width: 160px">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($destinations as $destination)
                                <tr>
                                    <td>
                                        <div class="number-badge">
                                            {{ ($destinations->currentPage() - 1) * $destinations->perPage() + $loop->iteration }}
                                        </div>
                                    </td>

                                    <td>
                                        @if($destination->image)
                                            <img src="{{ asset('storage/image/' . $destination->image) }}" alt="{{ $destination->nama }}" class="rounded-3 shadow-sm" style="width: 80px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border" style="width: 80px; height: 60px;">
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div>
                                            <div class="fw-bold text-dark mb-1">{{ $destination->nama }}</div>
                                            <small class="text-muted">ID: #{{ $destination->id }}</small>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="description-text text-muted">
                                            {{ $destination->description }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="location-pill">
                                            <i class="bi bi-geo-alt-fill text-danger"></i>
                                            {{ $destination->location }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge rounded-pill day-badge px-3 py-2">
                                            {{ $destination->working_days }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge rounded-pill hour-badge px-3 py-2">
                                            {{ $destination->working_hours }}
                                        </span>
                                    </td>

                                    <td class="text-end">
                                        <div class="fw-bold text-success fs-6">
                                            Rp {{ number_format($destination->ticket_price, 0, ',', '.') }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="/destinations/{{ $destination->id }}" class="btn action-btn btn-view" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a href="/destinations/{{ $destination->id }}/edit" class="btn action-btn btn-edit" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <form action="/destinations/{{ $destination->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn action-btn btn-delete" title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-folder-x display-5 d-block mb-3"></i>
                                            <h6 class="fw-semibold">Belum Ada Data</h6>
                                            <small>Silakan tambahkan destinasi wisata baru.</small>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- FOOTER TABLE --}}
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-4">
                    <div class="text-muted small">
                        Menampilkan
                        <span class="fw-semibold text-dark">{{ $destinations->firstItem() ?? 0 }}</span>
                        sampai
                        <span class="fw-semibold text-dark">{{ $destinations->lastItem() ?? 0 }}</span>
                        dari
                        <span class="fw-semibold text-dark">{{ $destinations->total() }}</span> data
                    </div>

                    <div class="custom-pagination">
                        {{ $destinations->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="card-footer border-0 bg-light text-center py-3 text-muted small">
                © 2026 Sistem Informasi Destinasi Wisata
            </div>
        </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .glass-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(18px);
    }

    .header-gradient {
        background: linear-gradient(135deg, #1d4ed8, #2563eb, #3b82f6);
    }

    .icon-box {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        background: rgba(255,255,255,0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .add-btn {
        transition: .25s ease;
    }

    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(0,0,0,.15);
    }

    .search-box {
        max-width: 420px;
        width: 100%;
    }

    .search-box .form-control:focus {
        box-shadow: none;
    }

    .custom-table thead {
        background: #f8fafc;
    }

    .custom-table thead th {
        padding: 18px 16px;
        font-size: .85rem;
        font-weight: 700;
        color: #64748b;
        border-bottom: 1px solid #e2e8f0;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .custom-table tbody td {
        padding: 18px 16px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .custom-table tbody tr {
        transition: .25s ease;
    }

    .custom-table tbody tr:hover {
        background: #f8fafc;
        transform: scale(1.003);
    }

    .number-badge {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .description-text {
        max-width: 240px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.5;
    }

    .location-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        font-size: .85rem;
        color: #334155;
    }

    .day-badge {
        background: #dcfce7;
        color: #166534;
    }

    .hour-badge {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: .25s ease;
        color: white;
    }

    .btn-view {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b, #f97316);
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .action-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.18);
        color: white;
    }

    .custom-pagination .pagination {
        gap: 8px;
        margin-bottom: 0;
    }

    .custom-pagination .page-link {
        border: none;
        border-radius: 12px !important;
        color: #475569;
        background: #f8fafc;
        padding: 10px 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .custom-pagination .page-link:hover {
        background: #dbeafe;
        color: #2563eb;
        transform: translateY(-2px);
    }

    .custom-pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: white;
        box-shadow: 0 8px 16px rgba(37,99,235,.35);
    }

    .custom-pagination .page-item.disabled .page-link {
        background: #e2e8f0;
        color: #94a3b8;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 1.25rem !important;
        }

        .custom-table thead th,
        .custom-table tbody td {
            padding: 14px 10px;
        }

        .description-text {
            max-width: 180px;
        }
    }
</style>

<script>
    setTimeout(() => {
        const alert = document.getElementById('successAlert');
        if (alert) {
            alert.style.transition = 'all .4s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => alert.remove(), 400);
        }
    }, 2500);
</script>
@endsection
```
