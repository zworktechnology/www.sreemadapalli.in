<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expence;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        return view('pages.backend.employee.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Employee();

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->email_address = $request->get('email_address');
        $data->address = $request->get('address');

        $uni_id_gen = $request->name;
        $uni_id_gen_one = $uni_id_gen[0];
        $uni_id_gen_two = $uni_id_gen[1];
        $last_customer  = Employee::orderBy('created_at', 'desc')->first();

        if (isset($last_customer)) {
            $data->unique_id  = $uni_id_gen_one . $uni_id_gen_two . '00' . ($last_customer->id + 1);
        } else {
            $data->unique_id  = $uni_id_gen_one . $uni_id_gen_two . '001';
        }

        $data->save();

        return redirect()->route('employee.index')->with('add', 'Successful addition of a new employee !');
    }

    public function view($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Employee::findOrFail($id);
        $expence = Expence::where('employee_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $expence_total_amount = Expence::where('employee_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('amount');

        return view('pages.backend.employee.view', compact('today', 'data', 'expence', 'expence_total_amount'));
    }

    public function edit($id)
    {
        $data = Employee::findOrFail($id);

        return view('pages.backend.employee.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Employee::findOrFail($id);

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->email_address = $request->get('email_address');
        $data->address = $request->get('address');

        $data->update();

        return redirect()->route('employee.index')->with('update', 'Employee detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Employee::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('employee.index')->with('soft_destroy', 'Successfully deleted the employee !');
    }

    public function destroy($id)
    {
        $data = Employee::findOrFail($id);

        $data->delete();

        return redirect()->route('employee.index')->with('destroy', 'Successfully erased the employee !');
    }

    public function getemployeephoneno($employee_id)
    {
        $employeedata = Employee::findOrFail($employee_id);
        $userData['data'] = $employeedata;
        echo json_encode($userData);
    }

    public function getemployeeId($phoneno)
    {
        $employeemobiledata = Employee::where('contact_number', '=', $phoneno)->first();
        $userData['data'] = $employeemobiledata;
        echo json_encode($userData);
    }
}
