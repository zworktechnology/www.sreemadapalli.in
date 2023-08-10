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
                                <h4 class="mb-sm-0 font-size-18">Attendence</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('attendence.index') }}">Attendence</a></li>
                                        <li class="breadcrumb-item active">Create</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row ">
                        <div class="col-xl-12">
                           <div class="card">
                              <div class="card-body border">
                                       <form autocomplete="off" method="POST" action="{{ route('attendence.store') }}">
                                        @csrf
                                          <div class="row mb-2">
                                            <label for="date" class="col-sm-2 col-form-label">
                                                Date <span style="color: red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="attendence_date" placeholder="Enter Your"  value="{{$today}}"required>
                                            </div>
                                          </div>
                                          <div class="row mb-2">
                                            <label for="date" class="col-sm-2 col-form-label">
                                                Month <span style="color: red;">*</span></label>
                                            <div class="col-sm-3">
                                            <select class="form-control select js-example-basic-single attendence_month" name="attendence_month" id="attendence_month"required>
                                                <option value="" selected class="text-muted">
                                                   Select Month</option>
                                                   <option value="January"@if ('January' === $month) selected='selected' @endif>January</option>
                                                   <option value="February"@if ('February' === $month) selected='selected' @endif>February</option>
                                                   <option value="March"@if ('March' === $month) selected='selected' @endif>March</option>
                                                   <option value="April"@if ('April' === $month) selected='selected' @endif>April</option>
                                                   <option value="May"@if ('May' === $month) selected='selected' @endif>May</option>
                                                   <option value="June"@if ('June' === $month) selected='selected' @endif>June</option>
                                                   <option value="July"@if ('July' === $month) selected='selected' @endif>July</option>
                                                   <option value="August"@if ('August' === $month) selected='selected' @endif>August</option>
                                                   <option value="September"@if ('September' === $month) selected='selected' @endif>September</option>
                                                   <option value="October"@if ('October' === $month) selected='selected' @endif>October</option>
                                                   <option value="November"@if ('November' === $month) selected='selected' @endif>November</option>
                                                   <option value="December"@if ('December' === $month) selected='selected' @endif>December</option>
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
                                                                     <th style="width:40%">Name</th>
                                                                     <th style="width:60%">Status</th>
                                                                  </tr>
                                                               </thead>
                                                               <tbody id="product_fields">
                                                               @foreach ($employees as $employees_arr)
                                                                  <tr>
                                                                     <td class="" >

                                                                              <input type="hidden" id="employee_id" name="employee_id[]"value="{{ $employees_arr->id }}" />
                                                                                 <input type="text"class="form-control"style="color:black;font-size:13px" name="product_name[]"
                                                                                       value="{{ $employees_arr->name }}" readonly>

                                                                     </td>
                                                                     <td>
                                                                     <select hidden class="form-control " onchange="this.className=this.options[this.selectedIndex].className" name="attendence_status[]"  >
                                                                        <option value="" disabled selected hiddden>Select</option>
                                                                        <option value="Present" class="greenText form-control">Present</option>
                                                                        <option value="Absent" class="redText form-control"  >Absent</option>
                                                                     </select>

                                                                     <input type="hidden" id="attendence_id" name="attendence_id[]" value=""/>
                                                                     <div class="form-check form-check-inline" style="border: 2px solid yellow;margin: 5px;background-color: green;color: white;padding-top: 10px;padding-bottom: 10px;padding-right: 20px;padding-left: 30px;">
                                                                           <input class="form-check-input attendence_status{{ $employees_arr->id }}" type="radio" name="attendence_status[{{ $employees_arr->id }}]" id="present{{ $employees_arr->id }}" value="Present">
                                                                           <label class="form-check-label" for="present{{ $employees_arr->id }}" style="color:white;font-size:13px">
                                                                           Present
                                                                           </label>
                                                                     </div>
                                                                     <div class="form-check form-check-inline" style="border: 2px solid yellow;margin: 5px;background-color: red;color: white;padding-top: 10px;padding-bottom: 10px;padding-right: 20px;padding-left: 30px;">
                                                                           <input class="form-check-input attendence_status{{ $employees_arr->id }}" type="radio" name="attendence_status[{{ $employees_arr->id }}]" id="absent{{ $employees_arr->id }}" value="Absent">
                                                                           <label class="form-check-label" for="absent{{ $employees_arr->id }}" style="color:white;font-size:13px">
                                                                           Absent
                                                                           </label>
                                                                     </div>
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
