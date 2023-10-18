@extends('admin.employee.layouts.master')
@section('content')
    <div class="content-wrapper contents-editprofile-page">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row pt-2 m-2 align-items-center">
                    <div class="col-sm-6 col-6">
                        <h3 class="m-0 text-dark editprofile-main-heading">Add Student</h3>
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
                                        <label for="tel">Profile Photo</label>
                                        <div style="border: 1px solid #ced4da; border-radius: 0.25rem;" class="input-group lft-form browse-btn">
                                            <span style="display: table; margin-left: auto; padding: 2px 4px 2px 3px;" class="input-group-btn">
                                                <label style="margin-bottom: 0px; font-weight: 400; padding: 4px 8px; border-radius: 7px; font-size: 14px;" class="btn slava-primary-bg btn-file text-white" for="imageInput">
                                                    <div class="input required">
                                                        <input id="imageInput" type="file" onchange="previewImage(event);" multiple>
                                                    </div> Browse
                                                </label>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Gender</label>
                                        <select id="gender" class="js-states form-control"
                                            style="width: 100%;  height: calc(2.25rem + 2px)!important;">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth <span class="text-danger">*</span></label>
                                            <div class="input-group date dob-input" id="rdob" data-target-input="nearest">
                                                <input type="date" class="form-control datetimepicker-input" data-target="#rdob" placeholder="Select Date of Birth" id="dob" name="dob">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="imagePreview"></div>
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-6  col-6">
                                        <a href="{{route('active.student')}}" style="padding: 7px 35px;border-radius: 8px;"
                                            class="btn slava-secendory-bg text-white text-right">Back</a>
                                    </div>
                                    <div class="col-sm-6  col-6">
                                        <button type="button" id="btn1"
                                            class="btn slava-primary-bg btn-block text-white save-btn-employee"
                                            onclick="StudRegistration()"> Save
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

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var imgElement = document.createElement('img');
        imgElement.setAttribute('src', reader.result);
        imgElement.setAttribute('width', '200'); // Set width for the preview image
        document.getElementById('imagePreview').innerHTML = ''; // Clear previous preview
        document.getElementById('imagePreview').appendChild(imgElement); // Append new preview image

        // Get the value of the previewed image (data URL)
        var previewedImageValue = reader.result;

        // Do something with the previewed image value, for example, log it to the console
        console.log("Previewed Image Value: " + previewedImageValue);

        // You can also return the value if needed
        // return previewedImageValue;
    };
    reader.readAsDataURL(event.target.files[0]);


}




    function StudRegistration() {



        $('#btn2').hide();

        var name = $('#name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var image =$("#imageInput")[0].files[0];

        var gender = $('#gender').val();
        var dob = $('#dob').val();


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



            if (dob == '') {
            $('#dob').focus();
            $('#dob').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#dob').css({
                'border': '1px solid #CCC'
            });



        $('#btn2').show();
        $('#btn1').hide();


        data = new FormData();

        data.append('name', name);
        data.append('email', email);
        data.append('mobile', mobile);
        data.append('image', image);
        data.append('gender', gender);
        data.append('dob', dob);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/employee/students-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    $('#btn2').hide();
                    $('#btn1').show();
                    Toastify({
                        text: "Student registered succesfully",
                        duration: 1000,
                        newWindow: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, green, green)",
                        },
                        callback: function() {
                            window.location.href = '/employee/students-active';
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
