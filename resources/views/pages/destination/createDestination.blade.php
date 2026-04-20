@extends('master')

@section('content')

<div style="background: linear-gradient(135deg, #f4f5f7, #80d7e2); min-height:100vh; padding:30px 0;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white py-2 text-center">
                        <h6 class="mb-0 fw-semibold">Tambah Destinasi</h6>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 border-0 shadow-sm mb-3">
                            <div class="fw-semibold mb-1">Terjadi kesalahan:</div>
                            <ul class="mb-0 ps-3 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- BODY --}}
                    <div class="card-body p-3 bg-white">

                        <form action="{{ route('destinations.store') }}" method="post" class="form-floating" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingInput" placeholder="image" name=image value="{{old('image') }}" accept=".jpg,.jpeg,.png">
                                <label for="floatingInput">Gambar Destinasi</label>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>                                   
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Destinasi" value="{{ old('nama') }}">
                                <label for="nama">Nama Destinasi</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
                                <label for="description">Description</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="location" name="location" placeholder="Location" value="{{ old('location') }}">
                                <label for="location">Location</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="working_days" name="working_days" placeholder="Working Days" value="{{ old('working_days') }}">
                                <label for="working_days">Working Days</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="working_hours" name="working_hours" placeholder="Working Hours" value="{{ old('working_hours') }}">
                                <label for="working_hours">Working Hours</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control form-control-sm" id="ticket_price" name="ticket_price" placeholder="Ticket Price" value="{{ old('ticket_price') }}" >
                                <label for="ticket_price">Ticket Price</label>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('destinations.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
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

</div>

{{-- STYLE --}}
<style>
    .form-control {
        border-radius: 10px;
        padding: 8px;
        font-size: 0.85rem;
    }

    .form-floating label {
        font-size: 0.75rem;
    }

    .form-control:focus {
        box-shadow: 0 0 6px rgba(78,115,223,0.3);
        border-color: #4e73df;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        transition: 0.2s;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }
</style>

@endsection