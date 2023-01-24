@extends('layouts.applayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaction Details</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#" onclick="goBackHdl()">Go Back</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Transaction Details</h2>
                                    <div class="invoice-number">Transaction #{{ $transaction->id }}</div>
                                </div>
                                <hr class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Admin Name:</strong><br>
                                            {{ $transaction->user_name }}<br>
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Transaction Date:</strong><br>
                                            {{ date('d M Y, H:i', strtotime($transaction->time)) }}<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">Transaction Summary</div>
                                <p class="section-lead">Price might be different than the current price</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Totals</th>
                                        </tr>
                                        @php $i = 1 @endphp
                                        @foreach ($transactionDetails as $detail)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $detail->food_name }}</td>
                                                <td class="text-center">
                                                    {{ $detail->food_price }}
                                                </td>
                                                <td class="text-center">{{ $detail->quantity }}</td>
                                                <td class="text-right">{{ $detail->quantity * $detail->food_price }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">
                                                {{ $transaction->total_price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@endsection
