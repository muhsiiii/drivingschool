<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DRIVING SCHOOL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/steering-wheelz.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <!-- css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/a-b.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- select2  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</head>

<body class="hold-transition sidebar-mini layout-fixed"
    style="height: 100vh;display: flex;justify-content: center;align-items: center;">

    @if (session('success'))
        <div id="flash-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-box">
                    <img style="width: 60px;margin:auto;display:table;padding-bottom:20px;."
                        src="{{ asset('assets/images/steering-wheel.png') }}" alt="sidebar-text-logo"
                        class="sidebar-text-logo">
                    <form>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="txt-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                                placeholder="Enter User Name">
                            <p class="usernameerrror"></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="txt-label">Password</label>
                            <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                                placeholder="Enter Password">
                            <p class="passworderror"></p>
                        </div>

                        <div class="remember-dv">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Remember me
                                </label>
                            </div>
                            <div class="forgot-dv">
                                <a href="#" class="forgot-txt">Forgot Password ?</a>
                            </div>
                        </div>
                        {{-- <a href="#" class="btn login-btn-main">Login</a> --}}
                        <button type="button" class="btn login-btn-main" id="btn1"
                            onclick="Login()">Login</button>
                        <button type="button" class="btn login-btn-main" id="btn2"><i
                                class="fa fa-spinner fa-spin"></i>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $('#btn2').hide();

        function Login(pid) {


            var username = $('#username').val();
            var password = $('#password').val();


            if (!username) {
                $('#username').focus();
                $('#username').css('border', '1px solid red');
                $('.usernameerrror').show().css('color', 'red');
                $('.usernameerrror').text("enter username*");
                return false;
            } else {
                $('#username').css('border', '1px solid #CCC');
                $('.usernameerrror').hide();
            }


            if (!password) {
                $('#password').focus();
                $('#password').css('border', '1px solid red');
                $('.passworderror').show().css('color', 'red');
                $('.passworderror').text("enter password*");
                return false;
            } else {
                $('#password').css('border', '1px solid #CCC');
                $('.passworderror').hide();
            }


            $('#btn2').show();
            $('#btn1').hide();





            data = new FormData();

            data.append('username', username);
            data.append('password', password);

            data.append('_token', '{{ csrf_token() }}');

            $.ajax({
                type: "POST",
                url: "/employee/do-login",
                data: data,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data['success']) {
                        $('#btn2').hide();
                        $('#btn1').show();
                        Toastify({
                            text: "login succesfull",
                            duration: 1000,
                            newWindow: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, green, green)",
                            },
                            callback: function() {
                                window.location.href = '/employee/dashboard';
                            },
                        }).showToast();


                    } else {
                        $('#btn2').hide();
                        $('#btn1').show();


                        Toastify({
                            text: "incorrect username or password",
                            duration: 1000,
                            newWindow: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, red, red)",
                            },
                            callback: function() {

                            },
                        }).showToast();
                    }
                }
            });
        }
    </script>




































    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $("#singletwo").select2({
            placeholder: "Select Your Gender",
            allowClear: true
        });
        $("#singlethree").select2({
            placeholder: "Select Your Designation",
            allowClear: true
        });
        $("#singlefour").select2({
            placeholder: "Select Status",
            allowClear: true
        });
    </script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="./js/adminlte.js"></script>
</body>

</html>
