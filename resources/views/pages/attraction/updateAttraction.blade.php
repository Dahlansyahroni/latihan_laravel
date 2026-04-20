@extends('master')


@section('content')
<div style="background: linear-gradient(135deg, #f4f5f7, #80d7e2); min-height:100vh; padding:30px 0;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white py-2 text-center">
                        <h6 class="mb-0 fw-semibold">Update Attraction</h6>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-3 bg-white">

                        <form action="{{ route('attractions.update', $attractions->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Nama Destinasi" value="{{ $attractions->name }}">
                                <label for="name">Nama Attraction</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="description" name="description" placeholder="Description" value="{{ $attractions->description }}">
                                <label for="description">Description</label>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('attractions.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
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

@endsection