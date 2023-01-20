@extends('layouts.applayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Froozen Food Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Frozen Food</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Weight</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Expiration</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                            @foreach ($foods as $food)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $food->food_name }}</td>
                                                    <td>{{ $food->weight }}</td>
                                                    <td>{{ $food->price }}</td>
                                                    <td>{{ $food->stock }}</td>
                                                    <td>{{ $food->expiration_date }}</td>
                                                    <td>{{ $food->description }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="/food/update/{{ $food->food_id }}"
                                                                class="btn btn-info mr-2">Update</a>
                                                            <a href="/food/delete/{{ $food->food_id }}"
                                                                class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    {{ $foods->links('pagination::bootstrap-4') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
