<?php

namespace App\Http\Requests\EmployeeManagment\EmployeeOnboarding;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeOnboardingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'joining_date'=>'required|date',
            'nid'=>'required|unique:users,nid',
            'designation_id'=>'required|exists:designations,id',
            'employment_type'=>'required|in:FULL-TIME,CONTRACTUAL,INTERN',
            'remuneration'=>'required|numeric',
            'father_name'=>'required',
            'mother_name'=>'required',
            'present_address'=>'required',
            'dob'=>'required|date',
            'bg'=>'required',
            'gender'=>'required',
        ];
    }
}
