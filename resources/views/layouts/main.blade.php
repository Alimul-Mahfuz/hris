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
                <div class="modal-dialog">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            <div class="modal fade" id="largeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            <div class="modal fade" id="extraLargeModal" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
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

<!-- jQuery Scrollbar -->
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Kaiadmin JS -->
<script src="{{asset('assets/js/kaiadmin.min.js')}}"></script>

<script src="{{asset('assets/js/form_submit.js')}}"></script>

{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        const modals = document.querySelectorAll('.modal');--}}

{{--        modals.forEach(function (modal) {--}}
{{--            modal.addEventListener('show.bs.modal', function (event) {--}}
{{--                const button = event.relatedTarget;--}}
{{--                const url = button.getAttribute('data-bs-content');--}}

{{--                fetch(url)--}}
{{--                    .then(response => response.text())--}}
{{--                    .then(data => {--}}
{{--                        modal.querySelector('.modal-content').innerHTML = data;--}}
{{--                    })--}}
{{--                    .catch(error => console.error('Error loading modal content:', error));--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
@yield('js')
</body>
</html>
