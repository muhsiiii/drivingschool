<?php

use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;



/***********************************************************************************************************************/
/************************************************************* ADMIN SIDE **********************************************************/
/***********************************************************************************************************************/


Route::get('/administrator', [AdminController::class, 'Login'])->name('admin.login');

Route::post('/admin/do-login', [AdminController::class, 'DoLogin'])->name('dologin');


Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/admin/logout', [AdminController::class, 'LogOut'])->name('logout');

    Route::get('/administator/dashboard', [AdminController::class, 'index'])->name('index');

    /************************************************************* employees **********************************************************/

    Route::get('/administator/employees-active', [AdminEmployeeController::class, 'EmployeeListActive'])->name('active.employee');
    Route::get('/administator/employees-blocked', [AdminEmployeeController::class, 'EmployeeListBlocked'])->name('blocked.employee');
    Route::get('/administator/employees-add', [AdminEmployeeController::class, 'EmployeeAdd'])->name('employee.add');


    Route::post('/administator/employees-save', [AdminEmployeeController::class, 'EmployeeSave'])->name('employeesave');
    Route::post('/administator/employees-block', [AdminEmployeeController::class, 'EmployeeBlock'])->name('employee.block');
    Route::post('/administator/employees-activate', [AdminEmployeeController::class, 'EmployeeActivate'])->name('employee.activate');

    Route::get('/administator/services', [AdminServiceController::class, 'Services'])->name('services');
    Route::post('/administator/services-save', [AdminServiceController::class, 'ServicesSave'])->name('services.save');
    Route::get('/administator/sub-services', [AdminServiceController::class, 'subServices'])->name('sub.services');
    Route::get('/administator/sub-services-add', [AdminServiceController::class, 'subServicesadd'])->name('sub.services.add');
    Route::post('/administator/sub-services-save', [AdminServiceController::class, 'subServicesSave'])->name('sub.services.save');


    Route::get('/administator/course', [CourseController::class, 'Course'])->name('course');
    Route::post('/administator/course-save', [CourseController::class, 'CourseSave'])->name('course.save');

    Route::get('/administator/sub-services/forms/{id}', [FormController::class, 'Forms'])->name('forms');
    Route::get('/administator/sub-services/forms-add/{id}', [FormController::class, 'FormsAdd'])->name('forms.add');




});

Route::get('/', [EmployeeController::class, 'empLogin'])->name('emp.login');
Route::post('/employee/do-login', [EmployeeController::class, 'EmployeedoLogin'])->name('employee.login');


Route::group(['middleware' => 'employee_auth'], function () {

    Route::get('/employee/logout', [AdminEmployeeController::class, 'empLogOut'])->name('emp.logout');
    Route::get('/employee/dashboard', [AdminEmployeeController::class, 'empindex'])->name('emp.index');

    Route::get('/employee/students-active', [AdminEmployeeController::class, 'StudentListActive'])->name('active.student');
    Route::get('/employee/students-blocked', [AdminEmployeeController::class, 'StudentListBlocked'])->name('blocked.student');
    Route::get('/employee/students-add', [AdminEmployeeController::class, 'StudentAdd'])->name('student.add');
    Route::post('/employee/students-save', [AdminEmployeeController::class, 'StudentSave'])->name('student.save');
    Route::get('/employee/students-edit/{id}', [AdminEmployeeController::class, 'StudentEdit'])->name('student.edit');


    Route::post('/employee/student-block', [AdminEmployeeController::class, 'StudentBlock'])->name('student.block');
    Route::post('/employee/student-activate', [AdminEmployeeController::class, 'StudentActivate'])->name('employee.activate');

    Route::get('/employee/students/attendance', [AttendanceController::class, 'Studentattendance'])->name('student.attendance');
    Route::post('/employee/students/attendance-save', [AttendanceController::class, 'StudentattendanceSave'])->name('student.attendance.save');
    Route::get('/employee/students/history', [AttendanceController::class, 'StudentHistory'])->name('student.history');
    Route::post('/get-history', [AttendanceController::class, 'Gethistory'])->name('gethistory');


});
