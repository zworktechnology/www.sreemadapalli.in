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
                            <h4 class="mb-sm-0 font-size-18">Open Account - {{ date('d.m.Y', strtotime($data->date)) }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('accountopen.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="date" class="col-sm-3 col-form-label">
                                            Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $data->date }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="amount" class="col-sm-3 col-form-label">
                                            Amount <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="amount" placeholder="Enter Your " required value="{{ $data->amount }}">
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Update</button>
                                            </div>
                                        </div>
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
