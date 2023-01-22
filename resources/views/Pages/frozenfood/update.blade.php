@extends('layouts.applayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Update Frozen Food Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#" onclick="goBackHdl()">Go Back</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form action="/food/update/{{ $food->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4>Update Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Food Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $food->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Weight (kg)</label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror"
                                            name="weight" value="{{ $food->weight }}">
                                        @error('weight')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                            name="stock" value="{{ $food->stock }}">
                                        @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input type="number"
                                                class="form-control currency @error('price') is-invalid @enderror"
                                                name="price" value="{{ $food->price }}">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Expiration Date</label>
                                        <input type="date"
                                            class="form-control datemask @error('expiration_date') is-invalid @enderror"
                                            name="expiration_date" value={{ $food->expiration_date }}>
                                        @error('expiration_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" style="height: 110px;" name="description">{{ $food->description }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>

    @if (session('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: "{{ session('error') }}",
                position: "topRight"
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            iziToast.success({
                title: 'Success',
                message: "{{ session('success') }}",
                position: "topRight"
            });
        </script>
    @endif
@endsection
