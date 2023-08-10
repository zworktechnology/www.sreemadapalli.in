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
                                <h4 class="mb-sm-0 font-size-18">Attendence Update</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('attendence.index') }}">Attendence</a></li>
                                        <li class="breadcrumb-item active">Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row ">
                        <div class="col-xl-12">
                           <div class="card">
                              <div class="card-body border">
                                       <form autocomplete="off" method="POST" action="{{ route('attendence.update', ['date' => $date]) }}" >
                                       @method('PUT')
                                        @csrf
                                          <div class="row mb-2">
                                            <label for="date" class="col-sm-2 col-form-label">
                                                Date <span style="color: red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="attendence_date" placeholder="Enter Your" readonly value="{{$date}}">
                                            </div>
                                          </div>
                                          <div class="row mb-2">
                                            <label for="date" class="col-sm-2 col-form-label">
                                                Month <span style="color: red;">*</span></label>
                                            <div class="col-sm-3">
                                            <select class="form-control select js-example-basic-single attendence_month" name="attendence_month" disabled id="attendence_month">
                                                <option value="" selected class="text-muted">
                                                   Select Month</option>
                                                   <option value="January"@if ('January' === $attendenceData->month) selected='selected' @endif>January</option>
                                                   <option value="February"@if ('February' === $attendenceData->month) selected='selected' @endif>February</option>
                                                   <option value="March"@if ('March' === $attendenceData->month) selected='selected' @endif>March</option>
                                                   <option value="April"@if ('April' === $attendenceData->month) selected='selected' @endif>April</option>
                                                   <option value="May"@if ('May' === $attendenceData->month) selected='selected' @endif>May</option>
                                                   <option value="June"@if ('June' === $attendenceData->month) selected='selected' @endif>June</option>
                                                   <option value="July"@if ('July' === $attendenceData->month) selected='selected' @endif>July</option>
                                                   <option value="August"@if ('August' === $attendenceData->month) selected='selected' @endif>August</option>
                                                   <option value="September"@if ('September' === $attendenceData->month) selected='selected' @endif>September</option>
                                                   <option value="October"@if ('October' === $attendenceData->month) selected='selected' @endif>October</option>
                                                   <option value="November"@if ('November' === $attendenceData->month) selected='selected' @endif>November</option>
                                                   <option value="December"@if ('December' === $attendenceData->month) selected='selected' @endif>December</option>
                                             </select>
                                            </div>
                                          </div>
                                          <style>
                                          .greenText{ background-color:green;color:white;font-size:13px }
                                          .redText{ background-color:red; color:white;font-size:13px  }
                                          </style> 
                                          <div class="row mb-2">
                                             <label for="date" class="col-sm-2 col-form-label">
                                                Employees <span style="color: red;">*</span></label>
                                                <div class="col-sm-6">
                                                   <div class=" table-responsive col-lg-12 col-sm-12 col-12">
                                                      <table class="table">
                                                               <thead>
                                                                  <tr>
                                                                     <th style="width:60%">Name</th>
                                                                     <th style="width:40%">Status</th>
                                                                  </tr>
                                                               </thead>
                                                               <tbody id="product_fields">
                                                               @foreach ($employees as $employees)
                                                                  <tr>
                                                                     <td class="" >
                                                                        
                                                                              
                                                                                 <input type="hidden" id="employee_id" name="employee_id[]"value="{{ $employees->id }}" />
                                                                                 <input type="text"class="form-control"style="color:black;font-size:13px" name="product_name[]"
                                                                                       value="{{ $employees->name }}" readonly>
                                                                     </td>
                                                                     <td>
                                                                     @foreach ($attend_data as $attend_datas)
                                                                        @if ($attend_datas->employee_id == $employees->id)

                                                                        <input type="hidden" id="attendence_id" name="attendence_id[]"value="{{$attend_datas->id}}" />

                                                                           <div class="form-check form-check-inline">
                                                                                 <input class="form-check-input attendence_status{{ $employees->id }}" type="radio"name="attendence_status[{{ $employees->id }}]" id="present{{ $employees->id }}" value="Present" {{ ($attend_datas->attendence_status=="Present")? "checked" : "" }} >
                                                                                 <label class="form-check-label" for="present{{ $employees->id }}" style="color:green;font-size:13px">
                                                                                 Present
                                                                                 </label>
                                                                           </div>
                                                                           <div class="form-check form-check-inline">
                                                                                 <input class="form-check-input attendence_status{{ $employees->id }}" type="radio" name="attendence_status[{{ $employees->id }}]" id="absent{{ $employees->id }}" value="Absent" {{ ($attend_datas->attendence_status=="Absent")? "checked" : "" }} >
                                                                                 <label class="form-check-label" for="absent{{ $employees->id }}" style="color:red;font-size:13px">
                                                                                 Absent
                                                                                 </label>
                                                                           </div>
                                                                       

                                                                           @endif
                                                                        @endforeach
                                                                     </td>

                                                                  </tr>
                                                                  @endforeach
                                                               </tbody>
                                                         </table>
                                                   </div>
                                                </div>

                                          </div>
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-success">Save</button>
                                          </div>
                                       </form>

                                                    


                              </div>
                           </div>
                        </div>
                    </div>

      </div>
   </div>
</div>


</div>



@endsection