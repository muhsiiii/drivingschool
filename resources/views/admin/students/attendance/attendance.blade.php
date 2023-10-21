@extends('admin.employee.layouts.master')
@section('content')
    <div class="content-wrapper contents-addemployee-page" style="min-height: 806px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row pt-2 m-2 align-items-center">
                </div>


                <div class="row pt-2 m-2 align-items-center">
                    <div class="col-sm-6 col-6">
                        <h3 class="m-0 text-dark editprofile-main-heading">Students Attendance</h3>
                    </div>
                </div>
                <div class="main-text-head slava-primary-bg m-2">
                    <h4 class="main-text-name text-white">Attendance</h4>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row m-2">
                    <div class="col-lg-12">
                        <div class="table-attendence">
                            <div class="col-lg-2 ">

                                <div class="form-group">
                                    <label>Date <span class="text-danger">*</span></label>
                                    <div class="input-group date dob-input" id="rdob" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input" data-target="#rdob"
                                            placeholder="Select Date of Birth" id="attendance" name="dob">
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <input type="hidden" id="auth_employee" value="{{ auth()->guard('employee')->name }}">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th class="name-col text-center">Student Name</th>
                                            <th>check here</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach ($activestudents as $activestudent)
                                            <tr class="student">
                                                <td class="name-col">{{ $loop->iteration }}</td>

                                                <td class="name-col">{{ $activestudent->name }}</td>
                                                <td class="attend-col" align="center"><input type="checkbox"
                                                        class="student-checkbox" name="status_{{ $activestudent->id }}"
                                                        class="student-checkbox" data-id="{{ $activestudent->id }}">
                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6  col-6">
                                    <a href="{{ route('active.student') }}" style="padding: 7px 35px;border-radius: 8px;"
                                        class="btn slava-secendory-bg text-white text-right">Back</a>
                                </div>
                                <div class="col-sm-6  col-6">
                                    <button type="button" id="btn1"
                                        class="btn slava-primary-bg btn-block text-white save-btn-employee"
                                        onclick="addAttendance()"> Save
                                    </button>
                                    <button type="button" id="btn2"
                                        class="btn slava-primary-bg btn-block text-white save-btn-employee">
                                        <i class="fa fa-spinner fa-spin"></i>Save
                                    </button>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Get the current date in the format yyyy-mm-dd
        function getCurrentDate() {
            const now = new Date();
            const year = now.getFullYear();
            let month = now.getMonth() + 1;
            let day = now.getDate();

            // Add leading zeros if month or day is less than 10
            if (month < 10) {
                month = '0' + month;
            }
            if (day < 10) {
                day = '0' + day;
            }

            return year + '-' + month + '-' + day;
        }

        // Set the value of the input field to the current date
        document.getElementById('attendance').value = getCurrentDate();


        document.addEventListener('DOMContentLoaded', function() {
            // Select all checkboxes with the class 'student-checkbox'
            var checkboxes = document.querySelectorAll('.student-checkbox');

            // Loop through each checkbox and set the 'checked' attribute to true
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        });


        function addAttendance() {
            $('#btn2').hide();
            var employee = $('#auth_employee').val();
            var date = $('#attendance').val();
            var selectedStudents = [];

            // Loop through each checked checkbox and get the data-id attribute
            $('.student-checkbox:checked').each(function() {
                selectedStudents.push($(this).data('id'));
            });

            $('#btn2').show();
            $('#btn1').hide();

            // Send data as JSON
            var requestData = {
                selected_students: selectedStudents,
                employee: employee,
                date: date,
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                type: "POST",
                url: "/employee/students/attendance-save",
                data: JSON.stringify(requestData),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data) {
                    if (data['success']) {
                        $('#btn2').hide();
                        $('#btn1').show();
                        Toastify({
                            text: "Student Attendance Added successfully",
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
                            text: "Something went wrong",
                            duration: 1000,
                            newWindow: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, red, red)",
                            },
                            callback: function() {},
                        }).showToast();
                    }
                }
            });
        }
    </script>
@endsection
