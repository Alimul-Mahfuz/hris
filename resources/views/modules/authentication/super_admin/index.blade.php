
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE-Edge"/>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="images/kaiadmin/favicon.ico" type="image/x-icon"/>
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"]},
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/kaiadmin.min.css')}}"/>
    <title>Super Admin Login HRIS-Raktch</title>
</head>
<body class="login bg-primary">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Super Admin | Sign In</h3>
        <form class="" method="POST" action="{{route('super_admin.authenticate')}}">
            @csrf
            <div class="login-form">
                <div class="form-sub">
                    <div class="form-floating form-floating-custom mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
                        <label for="email">Email</label>
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-custom mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
                        <label for="password">Password</label>
                        <div class="show-password">
                            <i class="fas fa-eye"></i>
                        </div>
                        @error('password')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-action mb-3">
                    <button type="submit" id="" name="" class="btn btn-primary w-100 btn-login">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/kaiadmin.min.js')}}"></script>
<script src="{{asset('assets/js/form_submit.js')}}"></script>

</body>
</html>
