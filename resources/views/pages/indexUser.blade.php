@extends('master')

@section('content')

<div class="main-bg">

<div class="content-section">

    <div class="container">

        {{-- CARD JUDUL --}}
        <div class="card border-0 shadow rounded-4 mb-3 text-center">
            <div class="card-body py-3 bg-dark text-white rounded-4">
                <h5 class="mb-1 fw-semibold">Daftar User</h5>
                <small class="opacity-75">Sistem Informasi Manajemen Data User</small>
            </div>
        </div>

        {{-- CARD DATA --}}
        <div class="card border-0 shadow rounded-4 overflow-hidden">

            {{-- TOOLBAR --}}
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-2">

                <a href="/user/create" 
                   class="btn btn-dark btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah User
                </a>

                <span class="badge bg-dark px-3 py-2">
                    {{ $users->total() }} Data
                </span>
            </div>

            {{-- BODY --}}
            <div class="card-body p-3">

                {{-- ALERT --}}
                @if(session('success'))
                    <div id="successAlert" class="alert alert-success py-2 px-3 small d-flex justify-content-between align-items-center mb-2">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close btn-sm" onclick="this.parentElement.remove()"></button>
                    </div>
                @endif

                {{-- SEARCH --}}
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0">List User</h6>

                    <form action="/user" method="get" style="max-width:220px;">
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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="small">
                            @forelse($users as $user)
                            <tr>

                                <td class="text-center">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                </td>

                                <td>{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>

                                <td class="text-center">********</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">

                                        {{-- EDIT --}}
                                        <a href="/user/{{ $user->id }}/edit" 
                                           class="btn btn-outline-warning btn-sm px-2 py-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="/user/{{ $user->id }}" 
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
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Belum ada data user
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="d-flex justify-content-between align-items-center mt-3">

                    <div class="small text-muted">
                        {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }}
                    </div>

                    {{ $users->links('pagination::bootstrap-5') }}

                </div>

            </div>

        </div>

    </div>

</div>

</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
/* BACKGROUND */
.main-bg {
    background: 
        linear-gradient(rgba(22, 21, 21, 0.144), rgba(20, 19, 19, 0.205)),
        url('https://i.etsystatic.com/43771025/r/il/db5453/5018571357/il_fullxfull.5018571357_hfjs.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* CONTENT */
.content-section {
    min-height:100vh;
    padding:40px 0;
}

/* ICON */
.btn-outline-warning,
.btn-outline-danger {
    border-width: 1.5px;
    font-weight: 600;
}

.btn-outline-warning i,
.btn-outline-danger i {
    font-size: 0.9rem;
}

.btn-outline-warning:hover {
    background-color: #ffc107;
    color: black;
    transform: scale(1.1);
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: white;
    transform: scale(1.1);
}

.d-flex.gap-1 {
    gap: 6px !important;
}
</style>

@endsection