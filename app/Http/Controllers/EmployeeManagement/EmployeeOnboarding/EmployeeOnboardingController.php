<?php

namespace App\Http\Controllers\EmployeeManagement\EmployeeOnboarding;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeManagment\EmployeeOnboarding\EmployeeOnboardingStoreRequest;
use App\Http\Requests\EmployeeManagment\EmployeeOnboarding\EmployeeOnboardingUpdateRequest;
use App\Models\CoreModule\Role;
use App\Models\UserModule\Designation;
use App\Models\UserModule\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;


class EmployeeOnboardingController extends Controller
{
    function index()
    {
        return view('modules.employee_management.submodules.employee_onboarding.index');
    }


    function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $designations = Designation::all();
        return view('modules.employee_management.submodules.employee_onboarding.modals.create', compact('designations'));
    }

    function store(EmployeeOnboardingStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $employee = new User();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->employee_id = 'RKT' . rand(10000, 99999);
        $employee->designation_id = $request->input('designation_id');
        $employee->employment_type=$request->input('employment_type');
        $employee->remuneration=$request->input('remuneration');
        $employee->joining_date = $request->input('joining_date');
        $employee->password = Hash::make("12345678");
        $employee->present_address = $request->input('present_address');
        $employee->permanent_address = $request->input('permanent_address');
        $employee->father_name = $request->input('father_name');
        $employee->mother_name = $request->input('mother_name');
        $employee->dob = $request->input('dob');
        $employee->nid = $request->input('nid');
        $employee->gender = $request->input('gender');
        $employee->bg = $request->input('bg');

        if ($request->hasFile('profile_image')) {
            $profile_image_file=$request->file('profile_image');
            $fileContent = file_get_contents($profile_image_file->getRealPath());
            $profileImageBase64 = base64_encode($fileContent);
            $employee->profile_image = $profileImageBase64;
        }

        // Handle signature image upload
        if ($request->hasFile('signature_image')) {
            $signature_image_file=$request->file('signature_image');
            $fileContent = file_get_contents($signature_image_file->getRealPath());
            $signatureImageBase64 = base64_encode($fileContent);
            $employee->signature_image = $signatureImageBase64;
        }

        $employee->save();
        return response()->json(['status' => 'success', 'message' => 'Employee information saved'], 200);
    }

    /**
     * @throws Exception
     */
    public function data(): \Illuminate\Http\JsonResponse
    {
        $data = User::with('designation')->select('id', 'employee_id', 'name','profile_image', 'email', 'designation_id', 'joining_date', 'is_active','employment_type')->orderBy('id', 'DESC');

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('designation_id', function ($data) {

                return $data->designation->name ?? 'N/A';
            })
            ->editColumn('is_active', function ($data) {
                $badgeClass = $data->is_active ? 'badge-success' : 'badge-danger';
                $statusText = $data->is_active ? 'Active' : 'Inactive';

                return '<span class="badge ' . $badgeClass . '">' . $statusText . '</span>';
            })
            ->editColumn('joining_date', function ($data) {
                return Carbon::parse($data->joining_date)->format('d-m-Y');  // Format date as 'dd-mm-yyyy'
            })
            ->editColumn('profile_image', function ($data) {
                return '<div class="avatar"><img src="data:image/png;base64,' . $data->profile_image . '" alt="user profile" class="avatar-img rounded-circle"></div>';
            })
            ->addColumn('action', function ($data) {
                return '<div class="btn-group dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu" role="menu" style="">
                          <li>
                            <a class="dropdown-item" data-bs-target="#extraLargeModal" data-bs-toggle="modal" style="cursor: pointer;" data-bs-content="' . route('employee_management.employee_onboarding.modal.edit', ['id' => $data->id]) . '">Edit</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </li>
                        </ul>
                      </div>';
            })
            ->rawColumns(['action', 'is_active', 'designation_id', 'joining_date','profile_image']) // Ensure 'action' and 'status' contain raw HTML
            ->make(true);
    }

    public function edit($id)
    {
        $user = User::query()->with('designation')->findOrFail($id);
        if (!$user) {
            return response()->json(['status' => 'false', 'User Not found'], 404);
        }
        $designations = Designation::all();
        $user->joining_date = Carbon::parse($user->joining_date)->format('Y-m-d');
        $user->dob = Carbon::parse($user->dob)->format('Y-m-d');
        return view('modules.employee_management.submodules.employee_onboarding.modals.edit', compact('designations', 'user'));

    }

    function update($id, EmployeeOnboardingUpdateRequest $request){
        $employee = User::query()->findOrFail($id);
        if(!$employee){
            return response()->json(['status' => 'false', 'User Not found'], 404);
        }
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->designation_id = $request->input('designation_id');
        $employee->employment_type=$request->input('employment_type');
        $employee->remuneration=$request->input('remuneration');
        $employee->joining_date = $request->input('joining_date');
        $employee->password = Hash::make("12345678");
        $employee->present_address = $request->input('present_address');
        $employee->permanent_address = $request->input('permanent_address');
        $employee->father_name = $request->input('father_name');
        $employee->mother_name = $request->input('mother_name');
        $employee->dob = $request->input('dob');
        $employee->nid = $request->input('nid');
        $employee->gender = $request->input('gender');
        $employee->bg = $request->input('bg');
        if ($request->hasFile('profile_image')) {
            $profile_image_file=$request->file('profile_image');
            $fileContent = file_get_contents($profile_image_file->getRealPath());
            $profileImageBase64 = base64_encode($fileContent);
            $employee->profile_image = $profileImageBase64;
        }

        // Handle signature image upload
        if ($request->hasFile('signature_image')) {
            $signature_image_file=$request->file('signature_image');
            $fileContent = file_get_contents($signature_image_file->getRealPath());
            $signatureImageBase64 = base64_encode($fileContent);
            $employee->signature_image = $signatureImageBase64;
        }
        $employee->save();
        return response()->json(['status' => 'success', 'message' => 'Employee information updated'], 200);


    }
}
