<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\MainController as MainController;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Validator;

class EmployeeApiController extends MainController
{

    /* List all employee data as json. */
    public function index()
    {
        // Get all employee from database.
        $employees = Employee::all();

        // Return json response of all employees.
        return $this->sendResponse(EmployeeResource::collection($employees), 'Employees retrieved successfully.');
    }


    /* Store employee data from a CSV file. */
    public function store(Request $request)
    {
        // Validate the incoming request and get the CSV file
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 400);
        }

        $csvFile = $request->file('csv_file');

        // Read CSV lines, skipping empty lines
        $lines = file($csvFile->getPathname(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Extract the header row
        $header = str_getcsv(array_shift($lines));

        // Define mappings between CSV headers and database columns
        $columnMapping = [
            // CSV Header => Database Column
            "Emp ID" => "employee_id",
            "Name Prefix" => "name_prefix",
            "First Name" => "first_name",
            "Middle Initial" => "middle_initial",
            "Last Name" => "last_name",
            "Gender" => "gender",
            "E Mail" => "email",
            "Date of Birth" => "date_of_birth",
            "Time of Birth" => "time_of_birth",
            "Age in Yrs." => "age_in_years",
            "Date of Joining" => "date_of_joining",
            "Age in Company (Years)" => "age_in_company_years",
            "Phone No. " => "phone_number",
            "Place Name" => "place_name",
            "County" => "country",
            "City" => "city",
            "Zip" => "zip",
            "Region" => "region",
            "User Name" => "user_name",
            // Add other headers and mappings here
        ];

        // Initialize success and error counters
        $successCount = 0;
        $errorCount = 0;
        $errorMessages = [];

        foreach ($lines as $line) {
            $data = str_getcsv($line);

            // Map CSV data to database columns
            $mappedData = [];
            foreach ($header as $index => $columnName) {
                if (array_key_exists($columnName, $columnMapping)) {
                    $mappedData[$columnMapping[$columnName]] = $data[$index];
                }
            }

            // Validate the data
            $validator = Validator::make($mappedData, [
                'employee_id' => 'required|integer|unique:employees,employee_id',
                'name_prefix' => 'string',
                'first_name' => 'string',
                'middle_initial' => 'string',
                'last_name' => 'string',
                'gender' => 'string',
                'email' => 'required|string|unique:employees,email',
                'date_of_birth' => 'string',
                'time_of_birth' => 'string',
                'age_in_years' => 'numeric',
                'date_of_joining' => 'string',
                'age_in_company_years' => 'numeric',
                'phone_number' => 'string',
                'place_name' => 'string',
                'country' => 'string',
                'city' => 'string',
                'zip' => 'string',
                'region' => 'string',
                'user_name' => 'required|string|unique:employees,user_name',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach ($errors->getMessages() as $field => $messages) {
                    $errorMessages[] = "Validation Error for employee_id: {$mappedData['employee_id']}. Fields: $field. Errors: " . implode(', ', $messages);
                }
                $errorCount++;
                continue;
            }

            // Save the data to the database
            if (Employee::create($mappedData)) {
                $successCount++;
            }
        }

        // Return the results
        $response = [
            'message' => 'CSV import completed.',
            'success_count' => $successCount,
            'error_count' => $errorCount,
            'errors' => $errorMessages,
        ];

        return response()->json($response, 200);
    }


    /* Show employee data as json. */
    public function show($id)
    {
        // Find the employee by ID
        $employee = Employee::find($id);

        // Check if the employee exists
        if (is_null($employee)) {
            // Return an error response if the employee is not found
            return $this->sendError('Employee not found.');
        }

        // Return a success response with the employee data
        return $this->sendResponse(new EmployeeResource($employee), 'Employee retrieved successfully.');
    }


    /* Update employee. */
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

}
