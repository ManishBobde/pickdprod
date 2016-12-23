<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'WelcomeController@home');

/*Portal API*/


    /*####################UserController###############################*/

    Route::get('user/changepassword', 'UserController@changePassword');

    Route::post('user/changepassword/{userId}', 'UserController@setPassword');

    Route::get('user/getprofiledetails/{userId}', 'UserController@getProfileDetails');

    Route::post('user/{userId}/setprofiledetails', 'UserController@setprofiledetails');

    /*####################AdminController###############################*/
    //Yet to be implemented

    Route::get('admin/home', 'AdminController@home');

    Route::get('user/all', 'AdminController@getAllUsers');

    Route::get('user/{userId}/details', 'AdminController@getUserDetails');

    Route::post('user/add', 'AdminController@addUser');

    Route::post('users/suspend', 'AdminController@suspendUsers');

    Route::post('users/resume', 'AdminController@resumeUsers');

    Route::post('users/delete', 'AdminController@deleteUsers');

    Route::post('user/{userId}/modify', 'AdminController@modifyUser');

    Route::put('user/{userId}/resetPassword', 'AdminController@resetUserPassword');



    /*####################AdminController###############################*/

    /*####################Curator or Editor Api###############################*/
    //Yet to be implemented

    Route::get('curator/home', 'CuratorController@home');

    Route::post('user/{userId}/post/save', 'CuratorController@savePost');

    Route::post('user/{userId}/post/submit', 'CuratorController@submitPost');


    Route::get('editor/home', 'EditorController@home');

    Route::get('user/{userId}/post/allsubmitted', 'EditorController@getAllSubmittedPosts');

    Route::put('user/{userId}/post/assign', 'EditorController@assignPost');

    Route::put('user/{userId}/post/modify', 'EditorController@modifyPost');

    Route::put('user/{userId}/post/publish', 'EditorController@publishPost');

    Route::get('user/post/allpublished', 'EditorController@getAllPublishedPosts');

    Route::put('user/{userId}/post/discard', 'EditorController@discardPost');

    Route::get('user/{userId}/post/alldiscarded', 'EditorController@getAllDiscardedPost');

    Route::post('user/post/{postId}/rating', 'EditorController@ratePost');

    Route::get('user/post/alldrafts', 'EditorController@getAllDraftedPosts');

    Route::get('user/post/create', 'EditorController@getCreatePostForm');

    Route::post('/user/post/publish', 'EditorController@publishPost');

    Route::get('/user/post/publish', 'EditorController@getToBePublishedPost');




    //Since Editor is also Curator we would be calling the Curator Controller
    // for all the post saving and submission
    Route::post('user/post/create', 'CuratorController@submitPost');

    Route::put('user/post/update', 'EditorController@updatePost');

    Route::get('/user/post/reassigned', 'EditorController@getAllReassignedPosts');





    /*####################Curator or Editor Api###############################*/

    Route::get('post/categories/all', 'CommonController@getAllCategories');

    Route::get('post/states/all', 'CommonController@getAllPostStates');

    Route::get('post/reviewer/all', 'CommonController@getAllReviewers');






Auth::routes();