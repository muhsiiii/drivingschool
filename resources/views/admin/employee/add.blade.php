@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper contents-editprofile-page">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row pt-2 m-2 align-items-center">
                    <div class="col-sm-6 col-6">
                        <h3 class="m-0 text-dark editprofile-main-heading">Add Employee </h3>
                    </div>
                </div>
                <div class="main-text-head slava-primary-bg m-2">
                    <h4 class="main-text-name text-white">Add new</h4>
                </div>
                <div class="col-12 mt-2">
                    <div class="card card-primary">
                        <!-- <div class="card-header slava-primary-bg">
                      <h3 class="card-title">Add New </h3>
                     </div> -->
                        <!-- form start -->
                        <form class="employee-det-add">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter  Name">
                                            <div class="invalid-feedback"> Name Required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email Address">
                                            <div class="invalid-feedback">Email Address Required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile Number <span class="text-danger">*</span> :</label>
                                            <input type="number" class="form-control" id="mobile" name="mobile"
                                                placeholder="Enter Mobile Number">
                                            <div class="invalid-feedback" id="mobile-span">Mobile Number Required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">User Name <span class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="username" name="name"
                                                placeholder="Enter  Name">
                                            <div class="invalid-feedback"> Name Required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Password <span class="text-danger">*</span> :</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Password">
                                            <div class="invalid-feedback">Password Required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Gender</label>
                                        <select id="gender" class="js-states form-control"
                                            style="width: 100%;  height: calc(2.25rem + 2px)!important;">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-6  col-6">
                                        <a href="{{route('active.employee')}}" style="padding: 7px 35px;border-radius: 8px;"
                                            class="btn slava-secendory-bg text-white text-right">Back</a>
                                    </div>
                                    <div class="col-sm-6  col-6">
                                        <button type="button" id="btn1"
                                            class="btn slava-primary-bg btn-block text-white save-btn-employee"
                                            onclick="EmpRegistration()"> Save
                                        </button>
                                        <button type="button" id="btn2"
                                            class="btn slava-primary-bg btn-block text-white save-btn-employee">
                                            <i class="fa fa-spinner fa-spin"></i>Save
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function EmpRegistration() {

        $('#btn2').hide();

        var name = $('#name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var password = $('#password').val();
        var username = $('#username').val();
        var gender = $('#gender').val();


        if (name == '') {
            $('#name').focus();
            $('#name').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#name').css({
                'border': '1px solid #CCC'
            });

        if (email == '') {
            $('#email').focus();
            $('#email').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#email').css({
                'border': '1px solid #CCC'
            });


        if (mobile == '') {
            $('#mobile').focus();
            $('#mobile').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#mobile').css({
                'border': '1px solid #CCC'
            });


            if (username == '') {
            $('#username').focus();
            $('#username').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#username').css({
                'border': '1px solid #CCC'
            });


        if (password == '') {
            $('#password').focus();
            $('#password').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#password').css({
                'border': '1px solid #CCC'
            });


        if (gender == '') {
            $('#gender').focus();
            $('#gender').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#gender').css({
                'border': '1px solid #CCC'
            });



        $('#btn2').show();
        $('#btn1').hide();


        data = new FormData();

        data.append('name', name);
        data.append('email', email);
        data.append('mobile', mobile);
        data.append('password', password);
        data.append('gender', gender);
        data.append('username', username);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/administator/employees-add",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    $('#btn2').hide();
                    $('#btn1').show();
                    Toastify({
                        text: "employee registered succesfully",
                        duration: 1000,
                        newWindow: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, green, green)",
                        },
                        callback: function() {
                            window.location.href = '/administator/employees-active';
                        },
                    }).showToast();


                } else {
                    $('#btn2').hide();
                    $('#btn1').show();


                    Toastify({
                        text: "something went wrong",
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
