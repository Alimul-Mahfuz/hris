<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Employee Onboarding Form</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form class="ajax-form" enctype="multipart/form-data" method="post"
          action="{{route('employee_management.employee_onboarding.store')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label><span class="required-span">*</span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nid" class="form-label">NID</label><span class="required-span">*</span>
                        <input type="text" class="form-control" id="nid" name="nid" placeholder="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone</label><span class="required-span">*</span>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="father_name" class="form-label">Father's Name</label><span
                        class="required-span">*</span>
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="mother_name" class="form-label">Mother's Name</label><span
                        class="required-span">*</span>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><span class="required-span">*</span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="designation_id" class="form-label">Designation</label><span
                            class="required-span">*</span>
                        <select class="form-select" id="designation_id" name="designation_id"
                                aria-label="Default select example">
                            <option selected disabled>Choose designation</option>
                            @foreach($designations as $designation )
                                <option value="{{$designation->id}}">{{$designation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="employment_type" class="form-label">Employment Type</label>
                        <select class="form-select" id="employment_type" name="employment_type"
                                aria-label="Default select example">
                            <option value="" selected disabled>Select Employment Type</option>
                            <option value="INTERN">INTERN</option>
                            <option value="CONTRACTUAL">CONTRACTUAL</option>
                            <option value="FULL-TIME">FULL-TIME</option>
                        </select>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="joining_date" class="form-label">Joining Date</label><span
                        class="required-span">*</span>
                    <input type="date" class="form-control" name="joining_date" id="joining_date">
                </div>


                <div class="mb-3">
                    <label for="remuneration" class="form-label">Remuneration</label>
                    <input type="text" class="form-control" name="remuneration" id="remuneration">
                </div>


            </div>
            <div class="col-12 col-md-5 d-flex flex-column justify-content-evenly">
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div class="avatar avatar-xxl">
                        <label for="" class="form-label">Profile Preview</label>
                        <img src="{{asset('assets/img/jm_denis.jpg')}}" alt="Employee Image"
                             class="avatar-img rounded-circle">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Profile Image</label><span
                        class="required-span">*</span>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" placeholder="">
                </div>

                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div class="">
                        <label for="" class="form-label">Signature</label>
                        <div>
                            <img src="" alt="Employee Signature" class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="signature_image" class="form-label">Signature</label>
                    <input type="file" class="form-control" id="signature_image" name="signature_image" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="present_address" class="form-label">Present Address</label>
                    <textarea class="form-control" id="present_address" name="present_address" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control">
                </div>
                <div class="row">
                    <!-- Blood Group Dropdown -->
                    <div class="col-md-6 mb-3">
                        <label for="bg" class="form-label">Blood Group</label>
                        <select class="form-select" id="bg" name="bg" aria-label="Default select example">
                            <option value="" selected disabled>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <!-- Gender Dropdown -->
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" aria-label="Default select example">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                            <option value="OTHER">Other</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

