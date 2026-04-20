
@extends('master')

@section('content')
<div style="background: linear-gradient(135deg, #f4f5f7, #80d7e2); min-height:100vh; padding:30px 0;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card border-0 shadow rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white py-3 text-center">
                        <h5 class="mb-0 fw-semibold">Tambah Review</h5>
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

                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="attraction_id" class="form-label">Pilih Destinasi</label>
                                <select class="form-select @error('attraction_id') is-invalid @enderror" id="attraction_id" name="attraction_id">
                                    <option value="" disabled selected>Pilih Destinasi</option>
                                    @foreach ($attractions as $attraction)
                                        <option value="{{ $attraction->id }}" {{ old('attraction_id') == $attraction->id ? 'selected' : '' }}>
                                            {{ $attraction->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('attraction_id')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- NAMA --}}
                            <div class="form-floating mb-3">
                                <input 
                                    type="text" 
                                    class="form-control @error('reviewer_name') is-invalid @enderror" 
                                    id="reviewer_name" 
                                    name="reviewer_name" 
                                    placeholder="Nama Review"
                                    value="{{ old('reviewer_name') }}"
                                >
                                <label for="reviewer_name">Nama Review</label>

                                @error('reviewer_name')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="form-floating mb-3">
                                <textarea 
                                    class="form-control @error('comment') is-invalid @enderror" 
                                    id="comment" 
                                    name="comment" 
                                    placeholder="Description"
                                    style="height: 120px"
                                >{{ old('description') }}</textarea>
                                <label for="description">Commnet</label>

                                @error('description')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
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
