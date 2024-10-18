<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Employee Onboarding Form</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form class="ajax-form" enctype="multipart/form-data" method="post"
          action="{{ route('employee_management.employee_onboarding.store') }}">
        @csrf
        <div class="row">
            <!-- Left Column Start-->
            <div class="col-12 col-md-7">
                <fieldset class="border p-3 mb-3">
                    <legend class="w-auto px-2">Personal Information</legend>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label><span class="required-span">*</span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nid" class="form-label">NID</label><span class="required-span">*</span>
                            <input type="text" class="form-control" id="nid" name="nid" placeholder="National ID">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone</label><span class="required-span">*</span>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="father_name" class="form-label">Father Name</label><span class="required-span">*</span>
                            <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mother_name" class="form-label">Mother Name</label><span class="required-span">*</span>
                            <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label><span class="required-span">*</span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                    </div>
                </fieldset>

                <fieldset class="border p-3 mb-3">
                    <legend class="w-auto px-2">Employment Details</legend>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="designation_id" class="form-label">Designation</label><span class="required-span">*</span>
                            <select class="form-select" id="designation_id" name="designation_id">
                                <option selected disabled>Choose designation</option>
                                @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="employment_type" class="form-label">Employment Type</label>
                            <select class="form-select" id="employment_type" name="employment_type">
                                <option value="" selected disabled>Select Employment Type</option>
                                <option value="INTERN">INTERN</option>
                                <option value="CONTRACTUAL">CONTRACTUAL</option>
                                <option value="FULL-TIME">FULL-TIME</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="joining_date" class="form-label">Joining Date</label><span class="required-span">*</span>
                            <input type="date" class="form-control" name="joining_date" id="joining_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="remuneration" class="form-label">Remuneration</label>
                            <input type="text" class="form-control" name="remuneration" id="remuneration" placeholder="Monthly salary">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="present_address" class="form-label">Present Address</label>
                        <textarea class="form-control" id="present_address" name="present_address" rows="3" placeholder="Current residential address"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" id="dob" name="dob" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bg" class="form-label">Blood Group</label>
                            <select class="form-select" id="bg" name="bg">
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
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                            <option value="OTHER">Other</option>
                        </select>
                    </div>
                </fieldset>
            </div>
            <!-- Left Column End-->

            <!-- Right Column Start -->
            <div class="col-12 col-md-5">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <div class="crop-container d-flex mb-3 flex-column justify-content-center align-items-center" id="profileDragArea" style="min-height: 200px; border: 2px dashed #ddd; cursor: pointer;">
                            <img src="" class="d-block my-3 rounded rounded-circle" id="imagePreview" style="max-width: 100%; display: none;">
                            <p class="text-muted">Upload Image</p>
                        </div>
                        <div class="mb-3">
                            <button type="button" id="cropButton" class="btn btn-sm btn-primary mt-2 mb-2" style="display: none">Crop Image</button>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>
                    </div>
                </div>

                <!-- Signature Preview -->
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <div class="crop-container d-flex mb-3 flex-column justify-content-center align-items-center" id="signatureDragArea" style="min-height: 100px; border: 2px dashed #ddd; cursor: pointer;">
                            <img src="" class="d-block my-3" id="signaturePreview" style="max-width: 100%; display: none;">
                            <p class="text-muted">Upload Signature</p>
                        </div>
                        <div class="mb-3">
                            <button type="button" id="signatureCropButton" class="btn btn-sm btn-primary mt-2 mb-2" style="display: none">Crop Signature</button>
                            <input type="file" class="form-control" id="signature_image" name="signature_image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column End -->

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script type="text/javascript">

    // Initialize cropper variables
    let cropper, signatureCropper;
    const profileImageInput = document.getElementById('profile_image');
    const imagePreview = document.getElementById('imagePreview');
    const cropButton = document.getElementById('cropButton');
    const profileDragArea = document.getElementById('profileDragArea');

    const signatureImageInput = document.getElementById('signature_image');
    const signaturePreview = document.getElementById('signaturePreview');
    const signatureCropButton = document.getElementById('signatureCropButton');
    const signatureDragArea = document.getElementById('signatureDragArea');


    // Handle profile image selection
    profileDragArea.addEventListener('click', () => profileImageInput.click());
    profileImageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';

                if (cropper) {
                    cropper.destroy();
                }

                cropper = new Cropper(imagePreview, {
                    aspectRatio: 1,
                    viewMode: 1,
                    autoCropArea: 1,
                    background: false,
                    guides: false,
                    highlight: false,
                    dragMode: 'none',
                    cropBoxResizable: false,
                    movable: false,
                    rotatable: false,
                    scalable: false,
                    zoomable: false,
                });

                cropButton.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle profile image cropping
    cropButton.addEventListener('click', () => {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 200,
                height: 200
            });

            imagePreview.src = canvas.toDataURL();
            // Convert canvas to Blob
            canvas.toBlob((blob) => {
                // Create a hidden input to store the cropped image
                let croppedImageInput = document.createElement('input');
                croppedImageInput.type = 'hidden';
                croppedImageInput.name = 'profile_image';
                const fileName = 'cropped_profile_image.png'; // You can customize this name
                const file = new File([blob], fileName, { type: 'image/png' });
                croppedImageInput.value = URL.createObjectURL(file);
                document.querySelector('.ajax-form').appendChild(croppedImageInput);
            }, 'image/png');

            cropper.destroy();
            cropper = null;

            cropButton.style.display = 'none';
        }
    });


    // Handle signature image selection
    signatureDragArea.addEventListener('click', () => signatureImageInput.click());
    signatureImageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                signaturePreview.src = reader.result;
                signaturePreview.style.display = 'block';

                if (signatureCropper) {
                    signatureCropper.destroy();
                }

                signatureCropper = new Cropper(signaturePreview, {
                    aspectRatio: 3, // Standard aspect ratio for signature (width:height = 3:1)
                    viewMode: 1,
                    autoCropArea: 1,
                    background: false,
                    guides: false,
                    highlight: false,
                    dragMode: 'none',
                    cropBoxResizable: false,
                    movable: false,
                    rotatable: false,
                    scalable: false,
                    zoomable: false,
                });

                signatureCropButton.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle signature cropping
    signatureCropButton.addEventListener('click', () => {
        if (signatureCropper) {
            const canvas = signatureCropper.getCroppedCanvas({
                width: 300, // Set desired width for cropped signature
                height: 100 // Set desired height for cropped signature
            });

            signaturePreview.src = canvas.toDataURL();

            canvas.toBlob((blob) => {
                // Create a hidden input to store the cropped signature
                let croppedSignatureInput = document.createElement('input');
                croppedSignatureInput.type = 'hidden';
                croppedSignatureInput.name = 'signature_image';
                const fileName = 'cropped_signature_image.png'; // You can customize this name
                const file = new File([blob], fileName, { type: 'image/png' });
                croppedSignatureInput.value = URL.createObjectURL(file);
                document.querySelector('.ajax-form').appendChild(croppedSignatureInput);
            }, 'image/png');

            signatureCropper.destroy();
            signatureCropper = null;

            signatureCropButton.style.display = 'none';
        }
    });



</script>
