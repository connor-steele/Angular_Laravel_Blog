<?php

use Illuminate\Http\Request;
use App\Article;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// =============================================
// HOME PAGE ===================================
// =============================================
Route::get('/', function()
{
    return View::make('index');
});
Route::put('comment/{comment}', 'CommentController@update');

Route::group(['middleware' => ['web']], function () {
    Route::resource('comments', 'CommentController');
});

// Templates
Route::group(array('prefix'=>'/templates/'),function(){
    Route::get('{template}', array( function($template)
    {
        $template = str_replace(".html","",$template);
        View::addExtension('html','php');
        return View::make('templates.'.$template);
    }));
});


// =============================================
// API ROUTES ==================================
// =============================================
// Route::group(array(), function() {

//     // since we will be using this just for CRUD, we won't need create and edit
//     // Angular will handle both of those forms
//     // this ensures that a user can't access api/create or api/edit when there's nothing there
//     Route::resource('comments', 'CommentController', 
//         array('except' => array('create', 'edit', 'update', 'delete')));
// });


// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
// Route::get('{any?}', function ($any = null) {
//     return View::make('index');
// })->where('any', '.*');
