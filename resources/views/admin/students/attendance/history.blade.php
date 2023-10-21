@extends('admin.employee.layouts.master')
@section('content')
    <div class="content-wrapper contents-addemployee-page" style="min-height: 806px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row pt-2 m-2 align-items-center">
                </div>


                <div class="row pt-2 m-2 align-items-center">
                    <div class="col-sm-6 col-6">
                        <h3 class="m-0 text-dark editprofile-main-heading">Students History</h3>
                    </div>
                </div>
                <div class="main-text-head slava-primary-bg m-2">
                    <h4 class="main-text-name text-white">History</h4>
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
                                            placeholder="Select Date of Birth" id="attendance" name="dob"
                                            onchange="date(this.value)">
                                    </div>

                                </div>
                                <button type="button" class="btn slava-primary-bg btn-block text-white"
                                    onclick="gethistory()"> Search
                                </button>

                            </div>
                            <div class="col-lg-12 mt-3">
                                <input type="hidden" id="auth_employee" value="{{ auth()->guard('employee')->name }}">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th class="name-col text-center">Student Name</th>
                                            <th>Check Here</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        {{-- @foreach ($activestudents as $activestudent) --}}
                                        <tr class="student" id="history">
                                            <td class="name-col"></td>

                                            <td class="name-col"></td>
                                            <td class="attend-col" align="center"><input type="checkbox"
                                                    class="student-checkbox" name="status_" class="student-checkbox"
                                                    data-id="">
                                            </td>

                                        </tr>
                                        {{-- @endforeach --}}


                                    </tbody>
                                </table>

                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6  col-6">
                                    <a href="{{ route('active.student') }}" style="padding: 7px 35px;border-radius: 8px;"
                                        class="btn slava-secendory-bg text-white text-right" onclick="abc()">Back</a>
                                </div>
                                {{-- <div class="col-sm-6  col-6">
                                    <button type="button" id="btn1"
                                        class="btn slava-primary-bg btn-block text-white save-btn-employee"
                                        onclick="addAttendance()"> Save
                                    </button>
                                    <button type="button" id="btn2"
                                        class="btn slava-primary-bg btn-block text-white save-btn-employee">
                                        <i class="fa fa-spinner fa-spin"></i>Save
                                    </button>

                                </div> --}}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function gethistory() {

            var date = $('#date').val();

            $.post("/get-history", {
                date: date,
                _token: "{{ csrf_token() }}"
            }, function(result) {

                $('#history').html(result);
            });
        }
    </script>
@endsection
