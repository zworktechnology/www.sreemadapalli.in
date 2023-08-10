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
                                <div>
                                        <a href="{{ route('attendence.create') }}">
                                            <button type="button" class="btn btn-success w-md" data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-lg">Create</button>
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
                @if (\Session::has('exists'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    {!! \Session::get('exists') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif




                    <div class="row ">
                        <div class="col-xl-12">
                           <div class="card">
                              <div class="card-body border" data-simplebar>

                                 <div class="row mb-3 file-1">


                                          <div class=" py-1 mb-3">

                                                <div class="row " >
                                                   <table class="table border " >
                                                        <thead><h4 style="text-transform: uppercase;text-align:center">{{ $current_month }}  |  {{ $current_year }}</h4></thead>
                                                      <thead>
                                                         <tr class="">
                                                            <th class="border">Date</th>
                                                            @foreach ($list as $lists)
                                                            <th class="border">{{ $lists }}</th>
                                                            @endforeach
                                                         </tr>
                                                      </thead>
                                                      <thead>
                                                         <tr class="">
                                                            <th class="border">Day</th>
                                                            @foreach ($listday as $listdays)
                                                            <th class="border">{{ substr($listdays, 0, 3) }}</th>
                                                            @endforeach
                                                         </tr>
                                                      </thead>

                                                      <tbody>

                                                        <tr>
                                                            <td class="border">Edit</td>
                                                            @foreach ($monthdates as $monthdate_arr)
                                                            <td><a href="{{ route('attendence.edit', ['date' => $monthdate_arr]) }}" class="btn btn-sm btn-soft-info">
                                                                <i class="mdi mdi-pencil-outline"></i></a></td>
                                                            @endforeach
                                                        </tr>
                                                      </tbody>
                                                      <tbody>


                                                            @foreach ($data as $employee)


                                                                <tr class="border">
                                                                   <td class="border">{{$employee->name}}</td>

                                                                            @foreach ($attendence_Data as $attendence_Data_arr)
                                                                                @if ($employee->id == $attendence_Data_arr['empid'])
                                                                                @if ($attendence_Data_arr['attendence_status'] != 'A')
                                                                                    <td class="border" style="color:green" >
                                                                                            {{ $attendence_Data_arr['attendence_status'] }}
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="border" style="color:red">
                                                                                        {{ $attendence_Data_arr['attendence_status'] }}
                                                                                    </td>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach

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
                    </div>






            </div>
        </div>

        @include('layouts.general.footer')

    </div>
</div>
@endsection
