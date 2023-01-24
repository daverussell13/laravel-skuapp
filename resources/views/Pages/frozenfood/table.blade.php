@extends('layouts.applayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Froozen Food Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active">Table</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/food/search" method="POST">
                                    @csrf
                                    <div class="float-left">
                                        <select id="searchcol" class="form-control selectric" name="colname"
                                            onchange="searchColChange()">
                                            <option value="name">Name</option>
                                            <option value="weight">Weight</option>
                                            <option value="price">Price</option>
                                            <option value="stock">Stock</option>
                                            <option value="expiration">Expiration</option>
                                            <option value="description">Description</option>
                                        </select>
                                    </div>
                                    <div class="float-right">
                                        <div class="input-group">
                                            <input id="input-keyword" type="text" class="form-control"
                                                placeholder="Search" name="keyword">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Name</th>
                                                <th class="text-center">Weight</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Stock</th>
                                                <th class="text-center">Expiration</th>
                                                <th>Description</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0 @endphp
                                            @foreach ($foods as $food)
                                                <tr>
                                                    <td class="text-center">{{ $foods->firstItem() + $i++ }}</td>
                                                    <td>{{ $food->name }}</td>
                                                    <td class="text-center">{{ $food->weight }}</td>
                                                    <td class="text-center" style="white-space: nowrap;">
                                                        Rp. {{ number_format($food->price, 2, ',', '.') }}
                                                    </td>
                                                    <td class="text-center">{{ $food->stock }}</td>
                                                    <td class="text-center" style="white-space: nowrap;">
                                                        {{ date('d M Y', strtotime($food->expiration_date)) }}
                                                    </td>
                                                    <td>{{ $food->description }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="/food/update/{{ $food->id }}"
                                                                class="btn btn-info mr-2">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button class="btn btn-danger"
                                                                data-confirm="Realy?|Do you want to continue?"
                                                                data-confirm-yes="deleteFrozenHdl({{ $food->id }})">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
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

@section('script')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
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
