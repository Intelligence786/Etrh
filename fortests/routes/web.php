<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//Friend

// Route::get('/add_friends', function(){

// return \App\User::find(Auth::user()->id)->add_friend($request->user_requested);

// });


Route::post('/add_friends', function(Request $request){

return \App\User::find(Auth::user()->id)->add_friend(2);

})->name('add_friende');

Route::get('/accept_friends', function(){

return \App\User::find(2)->accept_friend(1);

});


Route::get('/view_friends', function(){

return \App\User::find(2)->friends();

});


Route::get('/pending_friends', function(){

return \App\User::find(2)->pending_friend_request();

});


Route::get('/ids', function(){

return \App\User::find(2)->friends_ids();

});

//End friend

Auth::routes();





Route::get ('/about', function(){
return view('about');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'GlobController@showglob');

Route::get('glob/{id}', 'GlobController@showshow')->name('globShow');

Route::get('/', 'GlobController@showallglob')->name('allglob');


Route::get('/addcontent', 'GlobController@joinglobe');
//POST
Route::post('/addcontent', 'GlobController@saveglob')->name('saveGlob');
//DELETE
Route::delete('/addcontent/{glob}', function(\App\Glob $glob){

//$glob_tmp=\App\Glob::where('id', $glob)->first();



$glob->delete();

return redirect('/home');

})->name('globDelete');



Route::post('/addcontent/{glob}', function(\App\Glob $glob){

//$glob_tmp=\App\Glob::where('id', $glob)->first();


$glob->update();

return redirect('/addcontent');

})->name('globUpdate');


Route::get('/search', 'HomeController@search')->name('Search');


Route::get('/allpeople', 'HomeController@showAllPeople')->name('showAll');

Route::get('/edit', function () {
    return view('globedit');
});

Route::get('edit/{id}', 'GlobController@getglob');

Route::post('updateGlob', 'GlobController@updateglob')->name('updateGlob');

Route::get('/ch', function(){
	return \App\User::find(1)->add_friend(2);
});
	
//upload 

Route::get('upload', 'UploadsController@index')->name('uploadPhoto');
Route::post('upload/uploadFiles', 'UploadsController@multiple_upload');
Route::get('upload/viewAll', 'UploadsController@showallPictures')->name('allPict');

//End upload

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('createMes', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});


//likes

Route::post('/',['uses'=> 'GlobController@globLikeGlob','as'=>'Like']);