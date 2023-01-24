@extends('layouts.applayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Frozen Food</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active">Add</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form action="/food/create" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4>Input Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Food Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Weight (g)</label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror"
                                            name="weight" min="0">
                                        @error('weight')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="float" class="form-control @error('stock') is-invalid @enderror"
                                            name="stock" min="1">
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
                                                name="price" min="1">
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
                                            name="expiration_date">
                                        @error('expiration_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" style="height: 110px;" name="description"></textarea>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-success">Create</button>
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
