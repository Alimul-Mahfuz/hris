<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.header')
<body>
<div class="wrapper">
    <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">


        @include('partials.navbar')
        <div class="container">
            <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            <div class="modal fade" id="largeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            <div class="modal fade" id="extraLargeModal" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl custom-modal" role="document">
                    <div class="modal-content">

                    </div>
                </div>
            </div>


            <div class="page-inner">
                @yield('content')
            </div>
        </div>
        @include('partials.footer')
    </div>

</div>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/lib/cropperjs/cropper.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Kaiadmin JS -->
<script src="{{asset('assets/js/kaiadmin.min.js')}}"></script>

<script src="{{asset('assets/js/form_submit.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    document.getElementById('logoutButton').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default anchor behavior
        document.getElementById('logoutForm').submit(); // Submit the form
    });
    toastr.options = {
        "positionClass": "toast-bottom-right",
        "closeButton": true,
        "progressBar": true,
        "timeOut": "5000",
        "extendedTimeOut": "1000",
    };


    $(window).on('load', function () {
        // console.clear()
    })

    document.addEventListener('DOMContentLoaded', function () {
        // Attach a single event listener for the whole document
        document.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const modal = event.target; // The modal being shown
            const url = button.getAttribute('data-bs-content'); // URL to load content from

            // Show a loading spinner while the content is being fetched
            modal.querySelector('.modal-content').innerHTML = `
                <div class="text-center my-5">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>`;

            // Fetch the content from the URL
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    const modalContent = modal.querySelector('.modal-content');
                    modalContent.innerHTML = data;

                    // Extract and execute script tags from the loaded content
                    const scripts = modalContent.querySelectorAll('script');
                    scripts.forEach(script => {
                        const newScript = document.createElement('script');
                        newScript.textContent = script.textContent;
                        document.body.appendChild(newScript);
                        document.body.removeChild(newScript); // Optional: Clean up after execution
                    });
                })
                .catch(error => {
                    console.error('Error loading modal content:', error);
                    modal.querySelector('.modal-content').innerHTML = `
            <p class="text-danger text-center my-5">Error loading content. Please try again later.</p>`;
                });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var toastElement = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastElement);

        // Trigger the toast
        toast.show();
    });


</script>
@yield('js')
</body>
</html>
