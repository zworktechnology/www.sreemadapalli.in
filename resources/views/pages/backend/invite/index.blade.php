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
                            <h4 class="mb-sm-0 font-size-18">Invite</h4>
                            <div class="page-title-right">
                                <div>
                                    <a href="{{ route('invite.create') }}">
                                        <button type="button" class="btn btn-success w-md">Create</button>
                                    </a>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Email Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $keydata => $datas)
                                        <tr>
                                            <td>{{ ++$keydata }}</td>
                                            <td>
                                                @if ($datas->role_id == 1)
                                                <span>Super-Admin</span>
                                                @else
                                                <span>Admin</span>
                                                @endif
                                            </td>
                                            <td>{{ $datas->name }}</td>
                                            <td>{{ $datas->contact }}</td>
                                            <td>{{ $datas->email }}</td>
                                            <td>
                                                @if ($datas->invite_accepted_at == null)
                                                <span class="badge bg-danger">In Active</span>
                                                @else
                                                <span class="badge bg-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
