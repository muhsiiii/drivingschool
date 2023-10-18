@extends('admin.employee.layouts.master')
@section('content')
    <div class="content-wrapper contents-addemployee-page" style="min-height: 806px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row pt-2 m-2 align-items-center">
                </div>


                <div class="row pt-2 m-2 align-items-center">
                    <div class="col-sm-6 col-6">
                        <h3 class="m-0 text-dark editprofile-main-heading">Add Students </h3>
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
                                            <th class="text-center">Photograph</th>
                                            <th class="text-center">Personal Details</th>
                                            <th class="text-center">Learners Details</th>
                                            <th class="text-center">Driving Liscence Details</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activestudents as $stud)
                                            <tr>

                                                <td align="center">
                                                    <span class="text-secondary">{{ $loop->iteration }}</span>
                                                </td>

                                                <td align="center">
                                                    <span class="text-secondary">
                                                        <img src="{{ asset($stud->photo) }}" alt="" width="100px" height="100px">
                                                    </span>
                                                </td>
                                                <td align="center">
                                                    <span class="text-secondary">
                                                        <div style="text-align: left;">
                                                            name   : <b>{{ $stud->name }}</b><br>
                                                            email  : <b>{{ $stud->email }}</b><br>
                                                            mobile : <b>{{ $stud->mobile }}</b><br>
                                                            gender : <b>{{ $stud->gender }}</b><br>
                                                            dob    : <b>{{ $stud->dob }}</b><br>
                                                        </div>
                                                    </span>
                                                </td>

                                                <td align="center">
                                                    <span class="text-secondary"></span>
                                                </td>
                                                <td align="center">
                                                    <span class="text-secondary"></span>
                                                </td>
                                                <td>
                                                    <table class="table-borderless" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 0px !important;">
                                                                    <a class="btn btn-sm btn-danger text-white btn-block"
                                                                        title="Edit Franchise"
                                                                        style="color: white; font-size:15px; font-weight: 600; margin:2px;"
                                                                        onclick="Block('{{ $stud->id }}')">
                                                                        Block
                                                                    </a>
                                                                </td>
                                                                <td style="padding: 0px !important;">
                                                                    <a href="{{ route('student.edit',$stud->id) }}" class="btn btn-sm slava-secendory-bg text-white btn-block"
                                                                         title="Edit Franchise"
                                                                        style="color: white; font-size:15px; font-weight: 600; margin:2px;margin-left: 10px">
                                                                        <img src="{{ asset('assets/images/Vector (2).png') }}"
                                                                            alt="">
                                                                        Edit
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
                    <a href="{{ route('student.add') }}" class="add-btn-leave" title="Create-Leave-Application">
                        <img src="{{ asset('assets/images/add-item.png') }}" alt="">
                    </a>
                </div>
            </div>
        </section>
    </div>
    @endsection


<script>
    function Block(sid) {



        data = new FormData();
        data.append('sid', sid);
        data.append('_token', '{{ csrf_token() }}');

        Swal.fire({
            title: 'do you want to block this student..??',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "/employee/student-block",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data['success']) {

                    Toastify({
                        text: "student blocked succesfully",
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
        });

    }
</script>
