@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper contents-editprofile-page">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row pt-2 m-2 align-items-center">
                    <div class="col-sm-6 col-6">
                        <h3 class="m-0 text-dark editprofile-main-heading">Add Sub Service </h3>
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
                                        <label>Service</label>
                                        <select id="service" class="js-states form-control"
                                            style="width: 100%;  height: calc(2.25rem + 2px)!important;">
                                            <option value="">Select Service</option>
                                            @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->service }}</option>
                                            @endforeach
                                        </select>
                                        <span class="service_error" style="color:red;font-size:16px"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Service Name <span class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="ser_name" name="name"
                                                placeholder="Enter  Name">
                                            <div class="invalid-feedback"> Name Required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Amount <span class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="amount" name="name"
                                                placeholder="Enter  Amount">
                                            <div class="invalid-feedback"> Name Required.</div>
                                        </div>
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
                                            onclick="newservice()"> Save
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
    function newservice() {

        $('#btn2').hide();

        var service = $('#service').val();
        var subser_name = $('#ser_name').val();
        var amount = $('#amount').val();


        if (service == '') {
            $('#service').focus();
            $('#service').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#service').css({
                'border': '1px solid #CCC'
            });



        if (subser_name == '') {
            $('#ser_name').focus();
            $('#ser_name').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#ser_name').css({
                'border': '1px solid #CCC'
            });


        if (amount == '') {
            $('#amount').focus();
            $('#amount').css({
                'border': '1px solid red'
            });
            return false;
        } else

            $('#amount').css({
                'border': '1px solid #CCC'
            });


        $('#btn2').show();
        $('#btn1').hide();


        data = new FormData();

        data.append('service', service);
        data.append('subser_name', subser_name);
        data.append('amount', amount);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/administator/sub-services-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    $('#btn2').hide();
                    $('#btn1').show();
                    Toastify({
                        text: "sub service added succesfully",
                        duration: 1000,
                        newWindow: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, green, green)",
                        },
                        callback: function() {
                            window.location.href = '/administator/sub-services';
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
