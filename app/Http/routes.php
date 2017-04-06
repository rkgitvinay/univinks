<?php

Route::get('/admin', 'UserController@index');
Route::post('/login', 'UserController@login');
Route::get('/newPasswordPage', 'UserController@newPasswordPage');
Route::post('/newPassword', 'UserController@newPassword');
Route::get('/logout', 'UserController@logout');
Route::get('/admin/logout', 'UserController@adminLogout');
Route::post('/forgotPassword','UserController@forgotPassword');
Route::get('/email','UserController@email');

Route::post('/addCollege','AdminSetupCtrl@addCollege');
Route::post('/addDepartment', 'AdminSetupCtrl@addDepartment');
Route::get('/goToCourse/{step}', 'AdminSetupCtrl@goToCourse');
Route::get('/getCourses/{department_id}','AdminSetupCtrl@getCourses');
Route::post('/addSubject','AdminSetupCtrl@addSubject');
Route::get('/getSubjects/{course_id}', 'AdminSetupCtrl@getSubjects');
Route::post('/addPeople', 'AdminSetupCtrl@addPeople');
Route::get('/deletePeople','AdminSetupCtrl@deletePeople');
Route::get('/step/{at}','AdminSetupCtrl@step');
Route::post('uploadFacultyDatabase','AdminSetupCtrl@uploadFacultyDatabase');
Route::post('uploadStudentDatabase','AdminSetupCtrl@uploadStudentDatabase');
Route::get('/getCourseDetail', 'AdminSetupCtrl@getCourseDetail');
Route::post('/updateCourse', 'AdminSetupCtrl@updateCourse');
Route::get('/deleteCourse','AdminSetupCtrl@deleteCourse');
Route::get('/getSubjectDetail', 'AdminSetupCtrl@getSubjectDetail');
Route::post('/updateSubject','AdminSetupCtrl@updateSubject');
Route::get('/deleteSubject','AdminSetupCtrl@deleteSubject');

Route::get('/getPeopleDetail', 'AdminSetupCtrl@getPeopleDetail');
Route::post('/updatePeople', 'AdminSetupCtrl@updatePeople');


Route::get('/admin/departments', 'AdminSetupCtrl@departments');
Route::get('/admin/courses', 'AdminSetupCtrl@courses');
Route::get('/admin/subjects', 'AdminSetupCtrl@subjects');
Route::get('/admin/database', 'AdminSetupCtrl@database');
Route::get('/admin/people', 'AdminSetupCtrl@people');

Route::get('/faculty/{token}/{email}', 'FacultySetupCtrl@index');
Route::post('/faculty/setPassword','FacultySetupCtrl@setPassword');
Route::post('/faculty/setDepartment', 'FacultySetupCtrl@setDepartment');
Route::post('/faculty/setSubject', 'FacultySetupCtrl@setSubject');
Route::get('/facultySubject/subject/{subject_id}','FacultySetupCtrl@facultySubject');
Route::post('/faculty/uploadAssignment','FacultySetupCtrl@uploadAssignment');
Route::post('/faculty/deleteAssignment','FacultySetupCtrl@deleteAssignment');
Route::post('/faculty/postDiscussion', 'FacultySetupCtrl@postDiscussion');


Route::get('/', 'StudentSetupCtrl@index');
Route::post('/student/login','StudentSetupCtrl@login');
Route::post('/student/googleLogin','StudentSetupCtrl@googleLogin');
Route::post('/student/getStarted','StudentSetupCtrl@getStarted');
Route::get('/student/getStudentDetails','StudentSetupCtrl@getStudentDetails');
Route::post('/student/setStudentDetails','StudentSetupCtrl@setStudentDetails');

Route::get('/student/getStudentSem','StudentSetupCtrl@getStudentSem');

Route::post('/student/setStudentSem','StudentSetupCtrl@setStudentSem');
Route::get('student/subject/{subject_id}','StudentSetupCtrl@studentSubject');
Route::post('/student/upvote', 'StudentSetupCtrl@upvote');
Route::post('/student/downvote', 'StudentSetupCtrl@downvote');
Route::post('/student/postDiscussion','StudentSetupCtrl@postDiscussion');	
Route::post('/student/postComment','StudentSetupCtrl@postComment');
Route::post('/student/submitAssignment','StudentSetupCtrl@submitAssignment');
Route::get('/student/getSubmitAssignments', 'StudentSetupCtrl@getSubmitAssignments');