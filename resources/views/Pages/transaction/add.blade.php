@extends('layouts.applayout')

@section('meta')
    @livewireStyles
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Transaction</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active">Add</div>
                </div>
            </div>
            <div class="section-body">
                @livewire('create-transaction-table')
            </div>
        </section>
    </div>
@endsection

@section('script')
    @livewireScripts

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
