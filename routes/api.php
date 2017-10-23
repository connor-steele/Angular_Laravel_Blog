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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('bindings')->get('/comment', function(Request $request){
    return $request->comment();
});

Route::middleware('bindings')->post('/comment', function(Request $request){
    return $request->comment();
});

Route::middleware('bindings')->delete('/comment', function(Request $request){
    return $request->comment();
});
Route::middleware('bindings')->put('/comment', function(Request $request){
    return $request->comment();
});



// =============================================
// HOME PAGE ===================================
// =============================================
Route::get('/', function()
{
    return View::make('index');
});


// Route::get('comments', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return Comment::all();
// });
 
// Route::get('comments/{id}', function($id) {
//     return Comment::find($id);
// });

// Route::post('comments', function(Request $request) {
//     return Comment::create($request->all);
// });

// Route::put('comments/{id}', function(Request $request, $id) {
//     $comment = Comment::findOrFail($id);
//     $comment->update($request->all());

//     return $comment;
// });

// Route::delete('comments/{id}', function($id) {
//     Comment::find($id)->delete();

//     return 204;
// });
// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array(), function() {

    // since we will be using this just for CRUD, we won't need create and edit
    // Angular will handle both of those forms
    // this ensures that a user can't access api/create or api/edit when there's nothing there
    Route::resource('comments', 'CommentController', 
        array('except' => array('create', 'edit', 'update')));
});


// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
// Route::get('{any?}', function ($any = null) {
//     return View::make('index');
// })->where('any', '.*');
