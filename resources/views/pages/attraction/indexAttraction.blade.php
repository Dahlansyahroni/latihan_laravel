@extends('master')

@section('content')

<div class="attractions-page">
    <div class="container py-4">

        <!-- PAGE HEADER -->
        <div class="page-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="header-content">
                    <h2 class="page-title mb-1">
                        <i class="bi bi-compass-fill me-2"></i>Attractions
                    </h2>
                    <p class="page-subtitle mb-0">Manage and explore all attractions</p>
                </div>
                <a href="{{route('attractions.create')}}"
                   class="btn-add-new">
                    <i class="bi bi-plus-lg me-1"></i> Add New
                </a>
            </div>
        </div>

        <!-- MAIN CARD -->
        <div class="main-card">
            <div class="card-body p-4">

                <!-- STATS BAR -->
                <div class="stats-bar mb-4">
                    <div class="stat-item">
                        <i class="bi bi-collection"></i>
                        <div class="stat-content">
                            <span class="stat-label">Total Attractions</span>
                            <span class="stat-value">{{ $attractions->total() }}</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="bi bi-eye"></i>
                        <div class="stat-content">
                            <span class="stat-label">Showing</span>
                            <span class="stat-value">{{ $attractions->firstItem() }} - {{ $attractions->lastItem() }}</span>
                        </div>
                    </div>
                </div>

                <!-- ALERT -->
                @if(session('success'))
                    <div id="successAlert" class="alert-success-custom mb-4">
                        <div class="alert-icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div class="alert-content">
                            {{ session('success') }}
                        </div>
                        <button class="alert-close" onclick="this.parentElement.remove()">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                @endif

                <!-- SEARCH & FILTER BAR -->
                <div class="search-bar mb-4">
                    <div class="search-left">
                        <h5 class="mb-0 fw-semibold">All Attractions</h5>
                    </div>
                    <form action="{{ route('attractions.index') }}" method="get" class="search-form">
                        <div class="search-input-wrapper">
                            <i class="bi bi-search"></i>
                            <input type="text" name="search" class="search-input" placeholder="Search attractions..." value="{{ request('search') }}">
                        </div>
                        <button class="btn-search" type="submit">
                            Search
                        </button>
                    </form>
                </div>

                <!-- TABLE -->
                <div class="table-container">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>
                                    <span class="th-content">
                                        <i class="bi bi-tag"></i> Name
                                    </span>
                                </th>
                                <th>
                                    <span class="th-content">
                                        <i class="bi bi-geo-alt"></i> Destination
                                    </span>
                                </th>
                                <th>
                                    <span class="th-content">
                                        <i class="bi bi-file-text"></i> Description
                                    </span>
                                </th>
                                <th width="160" class="text-center">
                                    <span class="th-content">
                                        <i class="bi bi-gear"></i> Actions
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($attractions as $attraction)
                            <tr>
                                <td>
                                    <span class="row-number">{{ ($attractions->currentPage() - 1) * $attractions->perPage() + $loop->iteration }}</span>
                                </td>
                                <td>
                                    <div class="attraction-name">
                                        {{ $attraction->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="attraction-destination">
                                        {{ $attraction->destination->nama ?? 'No destination available.' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="attraction-desc">
                                        {{ Str::limit($attraction->description, 50) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('attractions.show', $attraction->id) }}"
                                           class="btn-action btn-view"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('attractions.edit', $attraction->id) }}"
                                           class="btn-action btn-edit"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{route('attractions.destroy', $attraction->id)}}"
                                              method="post"
                                              class="delete-form"
                                              onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn-action btn-delete"
                                                    title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>
                                        <p>No attractions found</p>
                                        <small>Start by adding your first attraction</small>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Showing {{ $attractions->firstItem() }} to {{ $attractions->lastItem() }} of {{ $attractions->total() }} results
                    </div>
                    <div class="pagination-custom">
                        {{ $attractions->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <div class="page-footer mt-4">
            <p class="mb-0">Sistem Informasi Destinasi Wisata • 2026</p>
        </div>

    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* PAGE BACKGROUND */
    .attractions-page {
        background: linear-gradient(135deg, #00030f 0%, #140127 100%);
        min-height: 100vh;
        padding: 20px 0 40px;
    }

    /* PAGE HEADER */
    .page-header {
        animation: slideDown 0.5s ease;
    }

    .page-title {
        color: white;
        font-weight: 700;
        font-size: 1.8rem;
    }

    .page-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.95rem;
    }

    .btn-add-new {
        background: white;
        color: #667eea;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }

    .btn-add-new:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        background: white;
        color: #090211;
    }

    /* MAIN CARD */
    .main-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        backdrop-filter: blur(10px);
        animation: fadeIn 0.6s ease;
    }

    /* STATS BAR */
    .stats-bar {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
    }

    .stat-item {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 16px 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .stat-item i {
        font-size: 2rem;
        opacity: 0.9;
    }

    .stat-content {
        display: flex;
        flex-direction: column;
    }

    .stat-label {
        font-size: 0.75rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 1.3rem;
        font-weight: 700;
    }

    /* ALERT */
    .alert-success-custom {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        padding: 14px 18px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 4px 15px rgba(17, 153, 142, 0.3);
        animation: slideDown 0.4s ease;
    }

    .alert-icon {
        font-size: 1.5rem;
    }

    .alert-content {
        flex: 1;
        font-weight: 500;
    }

    .alert-close {
        background: none;
        border: none;
        color: white;
        font-size: 1.3rem;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 6px;
        transition: background 0.2s;
    }

    .alert-close:hover {
        background: rgba(255,255,255,0.2);
    }

    /* SEARCH BAR */
    .search-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .search-form {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .search-input-wrapper {
        position: relative;
        background: #f7f8fc;
        border-radius: 10px;
        padding: 10px 14px 10px 38px;
        border: 2px solid transparent;
        transition: all 0.3s;
    }

    .search-input-wrapper i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }

    .search-input {
        border: none;
        background: transparent;
        outline: none;
        font-size: 0.9rem;
        min-width: 220px;
    }

    .search-input-wrapper:focus-within {
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .btn-search {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    /* TABLE */
    .table-container {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .table-modern {
        width: 100%;
        margin: 0;
        background: white;
    }

    .table-modern thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .table-modern thead th {
        padding: 14px 16px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .th-content {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .th-content i {
        font-size: 1rem;
    }

    .table-modern tbody tr {
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.2s;
    }

    .table-modern tbody tr:hover {
        background: #f7f8fc;
        transform: scale(1.005);
    }

    .table-modern tbody td {
        padding: 14px 16px;
        vertical-align: middle;
    }

    .row-number {
        background: #e8eaf6;
        color: #667eea;
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
    }

    .attraction-name {
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
    }

    .attraction-desc {
        color: #666;
        font-size: 0.85rem;
        line-height: 1.4;
    }

    /* ACTION BUTTONS */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 1rem;
    }

    .btn-view {
        background: #e3f2fd;
        color: #1976d2;
    }

    .btn-view:hover {
        background: #1976d2;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(25, 118, 210, 0.3);
    }

    .btn-edit {
        background: #fff3e0;
        color: #f57c00;
    }

    .btn-edit:hover {
        background: #f57c00;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(245, 124, 0, 0.3);
    }

    .btn-delete {
        background: #ffebee;
        color: #d32f2f;
    }

    .btn-delete:hover {
        background: #d32f2f;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(211, 47, 47, 0.3);
    }

    /* EMPTY STATE */
    .empty-state {
        text-align: center;
        padding: 50px 20px;
        color: #999;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 16px;
        opacity: 0.5;
    }

    .empty-state p {
        font-size: 1.1rem;
        font-weight: 600;
        margin: 12px 0 6px;
    }

    .empty-state small {
        font-size: 0.85rem;
    }

    /* PAGINATION */
    .pagination-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 24px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .pagination-info {
        color: #666;
        font-size: 0.85rem;
    }

    .pagination-custom nav {
        display: flex;
    }

    .pagination-custom .pagination {
        margin: 0;
        gap: 6px;
    }

    .pagination-custom .page-link {
        border: none;
        border-radius: 10px;
        padding: 8px 14px;
        color: #667eea;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.2s;
        background: #f0f2ff;
    }

    .pagination-custom .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .pagination-custom .page-link:hover {
        background: #e8eaf6;
        transform: translateY(-2px);
    }

    .pagination-custom .page-item.disabled .page-link {
        background: #f5f5f5;
        color: #ccc;
    }

    /* FOOTER */
    .page-footer {
        text-align: center;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.85rem;
    }

    /* ANIMATIONS */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .page-header .d-flex {
            flex-direction: column;
            gap: 16px;
            align-items: flex-start !important;
        }

        .btn-add-new {
            width: 100%;
            text-align: center;
        }

        .search-bar {
            flex-direction: column;
            align-items: stretch !important;
        }

        .search-form {
            flex-direction: column;
        }

        .search-input {
            min-width: 100%;
        }

        .btn-search {
            width: 100%;
        }

        .stats-bar {
            grid-template-columns: 1fr;
        }

        .table-modern {
            font-size: 0.8rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 6px;
        }

        .btn-action {
            width: 100%;
        }

        .pagination-wrapper {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<script>
    // Auto-hide success alert
    setTimeout(() => {
        let alert = document.getElementById('successAlert');
        if(alert){
            alert.style.transition = "opacity 0.4s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 400);
        }
    }, 3000);

    // Confirm delete
    function confirmDelete(event) {
        return confirm('Are you sure you want to delete this attraction?');
    }
</script>

@endsection