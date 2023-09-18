<?php


namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::paginate(20);
        return view('employees.index', ['employees'=>$employees]);
    }


    public function edit($id)
    {
        // Find the employee by ID
        $employee = Employee::find($id);

        return view('employees.edit',['employee'=>$employee]);

    }


    public function update(Request $request, $id)
    {

        // Find the employee by ID
        $employee = Employee::find($id);

        // Check if the employee exists
        if (is_null($employee)) {
            // Return an error response if the employee is not found
            return $this->sendError('Employee not found.');
        }

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|unique:employees,employee_id,' . $employee->id,
            'user_name' => 'required|unique:employees,user_name,' . $employee->id,
            'email' => 'required|unique:employees,email,' . $employee->id,
        ], [
            'employee_id.required' => 'Employee ID field is required.',
            'employee_id.unique' => 'This Employee ID is already in use.',
            'user_name.required' => 'User Name field is required.',
            'user_name.unique' => 'This User Name is already in use.',
            'email.required' => 'E-Mail field is required.',
            'email.unique' => 'This E-Mail is already in use.',
        ]);


        if ($validator->fails()) {
            // Return a validation error response with detailed error messages
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // Update the employee data
        $data = $request->only([
            'employee_id',
            'user_name',
            'name_prefix',
            'first_name',
            'middle_initial',
            'last_name',
            'gender',
            'email',
            'date_of_birth',
            'time_of_birth',
            'age_in_years',
            'date_of_joining',
            'age_in_company_years',
            'phone_number',
            'place_name',
            'country',
            'city',
            'zip',
            'region',
        ]);

        $employee->update($data);

        // Return a success response with the updated employee data
        return $this->sendResponse(new EmployeeResource($employee), 'Employee updated successfully.');

    }


    /* Delete employee. */
    public function destroy(Employee $employee)
    {
        // Delete the employee
        $employee->delete();


        // Return a success response
        return $this->sendResponse([], 'Employee deleted successfully.');
    }


    public static function sendResponse($result, $message)
    {
        // This method is responsible for sending a successful JSON response.

        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        // Flash success message to session
        session()->flash('sweetAlert', [
            'type'    => 'success', // SweetAlert bildiriminin türü (success, error, warning, info, vb.)
            'title'   => 'Success', // Bildirim başlığı
            'text'    => $message,  // Bildirim metni
        ]);

        // Return a JSON response with a 200 status code
        return redirect()->back();
    }


    public static function sendError($error, $errorMessages = [], $code = 404)
    {
        // This method is responsible for sending an error JSON response.

        $response = [
            'success' => false,
            'message' => $error,
        ];

        session()->flash('sweetAlert', [
            'type'    => 'error', // SweetAlert bildiriminin türü (success, error, warning, info, vb.)
            'title'   => 'error', // Bildirim başlığı
            'text'    => $errorMessages,  // Bildirim metni
        ]);

        // Return a JSON response with the specified status code
        return redirect()->back();
    }
}
