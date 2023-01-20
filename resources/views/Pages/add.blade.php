@extends('layouts.applayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Frozen Food</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Food Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Weight (kg)</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="number" class="form-control currency">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control datemask">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" style="height: 110px;"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-secondary">Reset</a>
                                <a href="#" class="btn btn-success">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
@endsection
