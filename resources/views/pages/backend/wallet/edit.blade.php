@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Wllaet</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('wallet.index') }}">Wallet</a></li>
                                    <li class="breadcrumb-item active">Update</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('wallet.update', ['id' => $data->id]) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <p>Date</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date"
                                                    placeholder="Enter Your " value="{{ $data->date }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <p>Customer</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control js-example-basic-single customer_id"
                                                    name="customer_id" id="customer_id" required>
                                                    <option value="" selected class="text-muted">
                                                        Select Customer</option>
                                                    @foreach ($customer as $customers)
                                                    <option value="{{ $customers->id }}" @if ($customers->id === $data->customer_id) selected='selected' @endif>{{ $customers->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <p>Amount</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="amount"
                                                    placeholder="Enter Your Amount " required value="{{ $data->amount }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.general.footer')

    </div>
</div>
@endsection
