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


//Route::put('comment/{comment}', 'CommentController@update');

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
