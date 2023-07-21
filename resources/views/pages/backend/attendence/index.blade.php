@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.notify-leftbar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Attendence</h4>
                            <div class="page-title-right">
                                <div hidden>
                                    <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create</button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        {{-- @include('pages.backend.employee.create') --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (\Session::has('add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {!! \Session::get('add') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {!! \Session::get('update') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('soft_destroy'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    {!! \Session::get('soft_destroy') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('destroy'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    {!! \Session::get('destroy') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead style="background: #CBE2DF">
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Name</th>
                                            <th>Phone No</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $keydata => $datas)
                                        <tr>
                                            <td>{{ ++$keydata }}</td>
                                            <td>{{ $datas->name }}</td>
                                            <td>{{ $datas->contact_number }}</td>
                                            <td>{{ $datas->salary_amount }}</td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger">Present</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="jobDelete{{ $datas->id }}" tabindex="-1" aria-labelledby="jobDeleteLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body px-4 py-5 text-center">
                                                        <div class="hstack gap-2 justify-content-center mb-0">
                                                            <form autocomplete="off" method="POST" action="{{ route('attendence.store') }}">
                                                                @csrf
                                                                <div>
                                                                    <div class="row mb-2" hidden>
                                                                        <div class="col-sm-12">
                                                                            <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $today }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2" hidden>
                                                                        <div class="col-sm-12">
                                                                            <input type="number" class="form-control" name="employee_id" placeholder="Enter Your " required value="{{ $datas->id }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2" hidden>
                                                                        <div class="col-sm-12">
                                                                            <input type="number" class="form-control" name="a_status" placeholder="Enter Your " required value="1">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-sm-12">
                                                                            <label>Salary Amount</label>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <input type="number" class="form-control" name="amount" placeholder="Enter Your " required value="{{ $datas->salary_amount }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2" hidden>
                                                                        <div class="col-sm-12" style="display: flex;">
                                                                            <div style="background-color: lightblue; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                                                                                <input type="radio" name="status" value="Pending" id="G-pay"
                                                                                    style="margin-left: 5px; margin-top:10px;">
                                                                                <label style="margin-right: 10px;" for="G-pay">GPAY</label>
                                                                            </div>
                                                                            <div style="background-color: lightpink; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                                                                                <input type="radio" name="status" value="Paid" id="Cash"
                                                                                    style="margin-left: 5px; margin-top:10px;">
                                                                                <label style="margin-right: 10px;" for="Cash">CASH</label>
                                                                            </div>
                                                                            <div style="background-color: lightgreen; border-style: solid; border-width: 0.5px; border-color: lightgray;">
                                                                                <input type="radio" name="status" value="Salary" id="Salary"
                                                                                    style="margin-left: 5px; margin-top:10px;" checked>
                                                                                <label style="margin-right: 10px;" for="Salary">SALARY</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-danger">Yes, Present</button>
                                                                </div>

                                                            </form>
                                                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4" hidden>
                        <div class="card">
                            <div class="card-body">
                                {{-- @include('pages.backend.employee.create') --}}
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
