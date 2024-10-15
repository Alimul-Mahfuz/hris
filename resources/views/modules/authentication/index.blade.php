<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
</head>
<style>
    .container-fluid{
        background-color: grey;
    }
</style>
<body>
    <div class="container-fluid min-vh-100">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="carb-body p-5">
                        <h3 class="my-3">HRIS-Racktch Login</h3>
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id" aria-describedby="employee_id">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
{{--                            <div class="mb-3 form-check">--}}
{{--                                <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-primary float-end">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
