@extends('layouts.main')
@section('title')
    Employee Onboarding
@endsection
@section('content')

    <div class="page-header">
        <h3 class="fw-bold mb-3">Employee Management</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Employee Onboarding</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-2">
            <a class="btn btn-primary my-3 btn btn-outline-dark float-right"
               data-bs-content="{{route('employee_management.employee_onboarding.modal.create')}}"
               data-bs-target="#extraLargeModal"
               data-bs-toggle="modal"
               style="cursor: pointer;">
                <i class="fas fa-plus"></i>&nbsp;New Onboard
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Employee List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="dataGrid"
                            class="display table table-hover"
                        >
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Image</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Employment Type</th>
                                <th>Joining date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">

        $('#dataGrid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employee_management.employee_onboarding.data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'profile_image', name: 'profile_image', orderable: false, searchable: false},
                {data: 'employee_id', name: 'employee_id', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'designation_id', name: 'designation_id', orderable: false, searchable: false},
                {data: 'employment_type', name: 'employment_type', orderable: false, searchable: false},
                {data: 'joining_date', name: 'joining_date', orderable: false, searchable: false},
                {data: 'is_active', name: 'is_active', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

    </script>

@endsection
