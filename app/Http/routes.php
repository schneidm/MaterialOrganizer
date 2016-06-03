<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@home');

Route::get('/assignmentcreator', 'AssignmentCreatorController@home');

Route::get('/questions', 'QuestionsController@home');

Route::get('/tutorials', 'TutorialController@home');


Route::post('/courses', 'CoursesController@store');

Route::post('/types', 'TypesController@store');

Route::post('/series', 'SeriesController@store');

Route::post('/topics', 'TopicsController@store');

//Question Post Requests

Route::post('/questions/store', 'QuestionsController@store');

Route::post('/questions/generator', 'QuestionsController@generator');

Route::post('/questions/delete', 'QuestionsController@delete');


//Assignment Creator Post Requests

Route::post('/assignmentcreator/create', 'AssignmentCreatorController@create');

Route::post('/assignmentcreator/ide', 'AssignmentCreatorController@ide');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|


Route::group(['middleware' => ['web']], function () {
    //
});
*/