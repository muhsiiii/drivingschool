@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper contents-addemployee-page" style="min-height: 806px;">
        <div class="modal fade" id="services" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Add Sub Services</h4>
                        <button onclick="modalclose()" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">New Service <span class="text-danger">*</span> :</label>
                                <input type="text" class="form-control" id="service" name="name"
                                    placeholder="Enter New Service">
                                <div class="invalid-feedback"> Name Required.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="modalclose()">Close</button>
                        <button type="button" class="btn btn-primary" id="btn1" onclick="serviceSave()">Save
                            changes</button>
                        <button type="button" class="btn btn-primary" id="btn2"><i class="fa fa-spinner fa-spin"></i>
                            Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row pt-2 m-2 align-items-center">
                </div>


                <div class="row pt-2 m-2 align-items-center">
                    <div class="col-sm-6 col-6">
                        <h3 class="m-0 text-dark editprofile-main-heading">Add Sub Services </h3>
                    </div>
                </div>
                <div class="main-text-head slava-primary-bg m-2">
                    <h4 class="main-text-name text-white">Add new</h4>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row m-2">
                    <div class="col-md-12">
                        <div style="padding: 10px !important;border-radius: 10px;"
                            class="card card-primary card-bg-timeline">
                            <div class="card-body">
                                <table style="border: 1px solid #D6D6D6;" class="table table-striped" id="example"
                                    width=100%>
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Service Name</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subservices as $service)
                                        <tr>
                                            <td align="center">
                                                <span class="text-secondary">{{ $loop->iteration }}</span>
                                            </td>
                                            <td align="center">
                                                <span class="text-secondary">{{ $service->service_name }}</span>
                                            </td>
                                            <td align="center">
                                                <span class="text-secondary">{{ $service->amount }}</span>
                                            </td>
                                            <td>
                                                <table class="table-borderless" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding: 0px !important;">
                                                                <a class="btn btn-sm btn-danger text-white btn-block"
                                                                    title="Edit Franchise"
                                                                    style="color: white; font-size:15px; font-weight: 600; margin:2px;"
                                                                    onclick="Block('')">
                                                                    <i class="fa-solid fa-ban"></i>
                                                                    Block
                                                                </a>
                                                            </td>
                                                            <td style="padding: 0px !important;">
                                                                <a class="btn btn-sm slava-secendory-bg text-white btn-block"
                                                                    target="_blank" title="Edit Franchise"
                                                                    style="color: white; font-size:15px; font-weight: 600; margin:2px;margin-left: 10px">
                                                                    <i class="fa-solid fa-pen"></i>
                                                                    Edit
                                                                </a>
                                                            </td>
                                                            <td style="padding: 0px !important;">
                                                                <a href="{{ route('forms',$service->id) }}" class="btn btn-sm btn-primary text-white btn-block"
                                                                     title="Edit Franchise"
                                                                    style="color: white; font-size:15px; font-weight: 600; margin:2px;margin-left: 15px">
                                                                    <i class="fa-solid fa-table-list"></i>
                                                                    Forms
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('sub.services.add') }}" class="add-btn-leave" title="Create-Leave-Application">
                        <img src="{{ asset('assets/images/add-item.png') }}" alt="">
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    // function Block(eid) {



    //     data = new FormData();
    //     data.append('eid', eid);
    //     data.append('_token', '{{ csrf_token() }}');

    //     Swal.fire({
    //         title: 'do you want to block employee..??',
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 type: "POST",
    //                 url: "/administator/employees-block",
    //                 data: data,
    //                 dataType: "json",
    //                 contentType: false,
    //                 processData: false,
    //                 success: function(data) {
    //                     if (data['success']) {

    //                         Toastify({
    //                             text: "employee blocked succesfully",
    //                             duration: 1000,
    //                             newWindow: true,
    //                             gravity: "top",
    //                             position: "right",
    //                             stopOnFocus: true,
    //                             style: {
    //                                 background: "linear-gradient(to right, green, green)",
    //                             },
    //                             callback: function() {
    //                                 window.location.href = window.location.href;
    //                             },
    //                         }).showToast();


    //                     } else {


    //                         Toastify({
    //                             text: "something went wrong",
    //                             duration: 1000,
    //                             newWindow: true,
    //                             gravity: "top",
    //                             position: "right",
    //                             stopOnFocus: true,
    //                             style: {
    //                                 background: "linear-gradient(to right, red, red)",
    //                             },
    //                             callback: function() {

    //                             },
    //                         }).showToast();
    //                     }
    //                 }
    //             });
    //         }
    //     });

    // }

    function openmodal() {
        $('#services').modal('show');
    }

    function modalclose() {
        $('#services').modal('hide');

    }


    function serviceSave() {

        $('#btn2').hide();

        var service = $('#service').val();

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


        $('#btn2').show();
        $('#btn1').hide();


        data = new FormData();

        data.append('service', service);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/administator/services-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    $('#btn2').hide();
                    $('#btn1').show();
                    Toastify({
                        text: "Service Added succesfully",
                        duration: 1000,
                        newWindow: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, green, green)",
                        },
                        callback: function() {
                            window.location.href = window.location.href;
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
