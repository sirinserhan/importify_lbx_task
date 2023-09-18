<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{

    public function toArray($request)
    {
        // This method is responsible for transforming the employee data into an array format.

        // We map the database columns to their corresponding names.
        return [
            'Employee ID' => $this->employee_id,
            'User Name' => $this->user_name,
            'Name Prefix' => $this->name_prefix,
            'First Name' => $this->first_name,
            'Middle Initial' => $this->middle_initial,
            'Last Name' => $this->last_name,
            'Gender' => $this->gender,
            'Date of Birth' => $this->date_of_birth,
            'Time of Birth' => $this->time_of_birth,
            'Age in Years' => $this->age_in_years,
            'Date of Joining' => $this->date_of_joining,
            'Age in Company (Years)' => $this->age_in_company_years,
            'Phone Number' => $this->phone_number,
            'Place Name' => $this->place_name,
            'Country' => $this->country,
            'City' => $this->city,
            'Zip' => $this->zip,
            'Region' => $this->region,
            'E-Mail' => $this->email,
            'created_at' => $this->created_at->format('d/m/Y'), // Format the creation date
            'updated_at' => $this->updated_at->format('d/m/Y'), // Format the update date
        ];
    }

}
