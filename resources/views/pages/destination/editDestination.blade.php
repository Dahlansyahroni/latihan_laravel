@extends('master')

@section('content')

<div style="background: linear-gradient(135deg, #f4f5f7, #80d7e2); min-height:100vh; padding:30px 0;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-warning text-dark py-2 text-center">
                        <h6 class="mb-0 fw-semibold">Edit Destinasi</h6>
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

                        <form action="{{ route('destinations.update', $destination->id) }}" method="post" class="form-floating" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                             <div class="mb-3">
                                <label class="form-label small fw-semibold">Gambar Saat Ini</label>
                                <div class="mb-2">
                                    @if($destination->image)
                                        <img src="{{ asset('storage/image/' . $destination->image) }}" alt="{{ $destination->nama }}" class="rounded-3 shadow-sm" style="width: 120px; height: 80px; object-fit: cover;">
                                    @else
                                        <span class="text-muted small">Tidak ada gambar</span>
                                    @endif
                                </div>
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="floatingInput" placeholder="image" name="image" accept=".jpg,.jpeg,.png">
                                    <label for="floatingInput">Ganti Gambar (Opsional)</label>
                                </div>
                                @error('image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>                                   
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Destinasi" value="{{$destination->nama}}">
                                <label for="nama">Nama Destinasi</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="description" name="description" placeholder="Description" value="{{$destination->description}}">
                                <label for="description">Description</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="location" name="location" placeholder="Location" value="{{$destination->location}}">
                                <label for="location">Location</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="working_days" name="working_days" placeholder="Working Days" value="{{$destination->working_days}}">
                                <label for="working_days">Working Days</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="working_hours" name="working_hours" placeholder="Working Hours" value="{{$destination->working_hours}}">
                                <label for="working_hours">Working Hours</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control form-control-sm" id="ticket_price" name="ticket_price" placeholder="Ticket Price" value="{{$destination->ticket_price}}">
                                <label for="ticket_price">Ticket Price</label>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between">
                                <a href="/destinations" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                                    ← Kembali
                                </a>

                                <button type="submit" class="btn btn-warning btn-sm rounded-pill px-3">
                                    Update
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

    .btn-warning:hover {
        transform: translateY(-1px);
        transition: 0.2s;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }
</style>

@endsection