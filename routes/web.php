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
Route::get('/', function () { return view('/Home'); });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	Route::get('/Dashboard', 'DashboardController@index')->name('Dashboard');
	Route::get('/Instellingen', 'instellingenController@index')->name('Instellingen');
	Route::get('/Profiel','ProfielController@myprofiel')->name('Profiel');
	Route::get('/Profiel/{nickname}','ProfielController@Userprofile')->name('userprofile');
	Route::get('/ProfielInstellingen','ProfielController@settings')->name('Profiel');

	Route::get('Profiel/EditPosts/{Post}','ProfielController@EditPostIndex')->name('indexeditpost');
	Route::post('Profiel/EditPosts/{Post}', 'ProfielController@EditPost')->name('editpost');

	Route::delete('/Profiel/RemovePosts{Post}','ProfielController@RemovePost')->name('post.destroy');

	Route::get('/Newsfeed','NewsfeedController@index')->name('newsfeed');
    Route::post('/Newsfeed/posttext', 'NewsfeedController@posttext')->name('posttext');
    Route::post('/Newsfeed/postfoto', 'NewsfeedController@postfoto')->name('postfoto');
    Route::post('/Newsfeed/postcitaat', 'NewsfeedController@postcitaat')->name('postcitaat');
    Route::post('/Newsfeed/addcomment', 'GlobalController@CreateComment')->name('comment_add');

    Route::get('/Newsfeed/like/{posts}', 'NewsfeedController@addLikes')->name('likes');

	// Route::get('/Newsfeed/friendPost', 'NewsfeedController@showFriends');
	// Route::get('/Newsfeed/addPost', function (){ return view('Newsfeed.addPost');});
	// Route::post('/Newsfeed/addPost', 'NewsfeedController@addPost')->name('post');
    // Route::get('/Newsfeed/likes', 'NewsfeedController@showLikes');
//	Route::post('/Newsfeed/newsfeedPage', 'NewsfeedController@show')->name('show');
	// Route::get('/votepoll/{post}','NewsfeedController@poll');
	// Route::post('/votepoll/vote/{post}','NewsfeedController@votepoll')->name('votepoll');
	//Route::get('/Newsfeed/newsfeedPage', 'NewsfeedController@poll');
    // Route::get('/vrienden/vrienden', 'vriendenController@show');



    Route::post('ProfielInstellingen/UpdateBio', 'ProfielController@UpdateBio')->name('updatebio');
    Route::post('ProfielInstellingen/UpdatePF', 'ProfielController@UpdatePF')->name('updatepf');
    Route::post('ProfielInstellingen/EditHeader', 'ProfielController@EditHeader')->name('EditHeader');
    Route::post('ProfielInstellingen/EditFont', 'ProfielController@EditFont')->name('EditFont');
    Route::post('ProfielInstellingen/EditBody', 'ProfielController@EditBody')->name('EditBody');
    Route::post('ProfielInstellingen/RemovePF', 'ProfielController@RemovePF')->name('removepf');

    Route::get('Profiel/EditPosts/{Post}', 'ProfielController@EditPostIndex')->name('indexeditpost');
    Route::post('Profiel/EditPosts/{Post}', 'ProfielController@EditPost')->name('editpost');

    Route::delete('/Profiel/RemovePosts{Post}', 'ProfielController@RemovePost')->name('post.destroy');

    Route::post('/Instellingen/editFirstname', 'instellingenController@editFirstname')->name('edit_name');
    Route::post('/Instellingen/editLastname', 'instellingenController@editLastname')->name('edit_lastname');
    Route::post('/Instellingen/editEmail', 'instellingenController@editEmail')->name('edit_email');
    Route::post('/Instellingen/editPassword', 'instellingenController@editPassword')->name('edit_password');
    Route::post('/Instellingen/editBirthday', 'instellingenController@editBirthday')->name('edit_birthday');
    Route::post('/Instellingen/editNickname', 'instellingenController@editNickname')->name('edit_nickname');
    Route::post('/Instellingen/deleteAcc', 'instellingenController@delete')->name('delete_acc');

    Route::get('/Discover/TopPosts', 'DiscoverController@sortposts');
    Route::get('/Discover/TopHashtags', 'DiscoverController@Sorthashtags');
    Route::get('/Discover/RecommendedFriends', 'DiscoverController@Voorgesteldevrienden');
    Route::get('/Discover/searchFriends', 'DiscoverController@ZoekVrienden');
    Route::get('/Follow/{user}', 'GlobalController@Follow')->name('Follow');

    Route::get('/comment', 'GlobalController@showpostandcomment')->name('comment');
    // 
    Route::get('/comment/updateshow/{comment}', 'GlobalController@ShowUpdateComment')->name('comment.show.update');
    Route::post('/comment/update/{comment}', 'GlobalController@UpdateComment')->name('comment.update');
    Route::get('/comment/remove/{comment}', 'GlobalController@DeleteComment')->name('comment.delete');

    Route::post('/notification/get', 'NotificationController@get');
    Route::post('/notification/read', 'NotificationController@read');

//	Route::post('/Newsfeed/newsfeedPage', 'NewsfeedController@show')->name('show');
	// Route::get('/votepoll/{post}','NewsfeedController@poll');
	// Route::post('/votepoll/vote/{post}','NewsfeedController@votepoll')->name('votepoll');
	//Route::get('/Newsfeed/newsfeedPage', 'NewsfeedController@poll');
    // Route::get('/vrienden/vrienden', 'vriendenController@show');
});