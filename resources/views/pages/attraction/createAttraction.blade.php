```blade
@extends('master')

@section('content')
<div style="background: linear-gradient(135deg, #f4f5f7, #80d7e2); min-height:100vh; padding:30px 0;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white py-3 text-center">
                        <h5 class="mb-0 fw-semibold">Tambah Attraction</h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-4 bg-white">

                        {{-- ERROR ALERT --}}
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

                        <form action="{{ route('attractions.store') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="destination_id" class="form-label">Pilih Destinasi</label>
                                <select class="form-select @error('destination_id') is-invalid @enderror" id="destination_id" name="destination_id">
                                    <option value="" disabled selected>Pilih Destinasi</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}" {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                                            {{ $destination->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('destination_id')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- NAMA --}}
                            <div class="form-floating mb-3">
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    placeholder="Nama Attraction"
                                    value="{{ old('name') }}"
                                >
                                <label for="name">Nama Attraction</label>

                                @error('name')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="form-floating mb-3">
                                <textarea 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    id="description" 
                                    name="description" 
                                    placeholder="Description"
                                    style="height: 120px"
                                >{{ old('description') }}</textarea>
                                <label for="description">Description</label>

                                @error('description')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('attractions.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                    ← Kembali
                                </a>

                                <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
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
@endsection
