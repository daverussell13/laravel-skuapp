@extends('layouts.applayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaction Data</h1>
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
                                <form action="/transaction/search" method="POST">
                                    @csrf
                                    <div class="float-left">
                                        <select class="form-control selectric" name="colname">
                                            <option value="admin_name">Admin Name</option>
                                            <option value="admin_email">Total Price</option>
                                        </select>
                                    </div>
                                    <div class="float-right">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="keyword">
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
                                                <th class="text-center">Transaction Time</th>
                                                <th class="text-center">Admin Name</th>
                                                <th class="text-center">Total Price</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0 @endphp
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td class="text-center">{{ $transactions->firstItem() + $i++ }}</td>
                                                    <td class="text-center">
                                                        {{ date('d M Y, H:i', strtotime($transaction->time)) }}
                                                    </td>
                                                    <td class="text-center">{{ $transaction->user_name }}</td>
                                                    <td class="text-center" style="white-space: nowrap;">
                                                        Rp. {{ number_format($transaction->total_price, 2, ',', '.') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="/transaction/detail/{{ $transaction->id }}"
                                                            class="btn btn-primary">View Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    {{ $transactions->links('pagination::bootstrap-4') }}
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
