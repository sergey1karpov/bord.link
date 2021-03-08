<?php

Auth::routes();

Route::get('', 'MainPageController@index')->name('musics'); //Main Page

Route::resource('/blog', 'BlogController'); //Blog

Route::get('/contacts', 'SendEmailController@index'); //Send Mail
Route::post('/contacts/send', 'SendEmailController@send');

Route::get('/id{id}/home', 'AdminController@admin')->name('home'); //Admin page
Route::patch('home/edit/{userId}', 'AdminController@editAdminForUsers')->name('editAdminForUsers');
Route::delete('home/delete/{userId}', 'AdminController@deleteAdminForUsers')->name('deleteAdminForUsers');

// Profile
Route::get('/{nickname}', 'ProfileController@index')->name('profile'); //Отобр профиля

Route::post('/{id}/store', 'ProfileController@store')->name('profile.store'); //Публикует пост

Route::get('/id{id}/post/{postId}', 'ProfileController@post')->name('userPost');
Route::patch('id{id}/{postId}/edit', 'ProfileController@editPost')->name('editPost');


//Like post
Route::patch('id{id}/{postId}/like', 'LikePostController@likePost')->name('likePost');

//Follow for user
Route::patch('id{my_id}/{follow_user_id}/follow', 'FollowersController@followUser')->name('followUser');


//Comment Post
Route::post('/id{id}/post/{postId}/comment', 'CommentController@sendComment')->name('sendComment');
Route::delete('/id{id}/post/{postId}/comment/{commentId}/delete', 'CommentController@deleteComment')->name('deleteComment');
Route::patch('/id{id}/post/{postId}/comment/{commentId}/edit', 'CommentController@editComment')->name('editComment');
//End Comment Post

Route::get('/{id}/edit', 'ProfileController@showEditProfileInformationPage')->name('editProfile'); //Показ стр редакт
Route::patch('/{id}/edit', 'ProfileController@editProfileInformation')->name('editProfileInformation'); //Редакт
Route::delete('delete/{id}', 'ProfileController@delete')->name('deletePost');

Route::get('/id{id}/video', 'ProfileController@allVideo')->name('allVideo');
Route::get('/id{id}/video/{video}', 'ProfileController@video')->name('video');
Route::post('/id{id}/video/create', 'ProfileController@addProfileVideo')->name('addProfileVideo')->middleware('throttle:3,1440');
Route::patch('/id{id}/video/{video}/update', 'ProfileController@updateVideo')->name('updateVideo');
Route::delete('/id{id}/video/delete', 'ProfileController@deleteVideo')->name('deleteVideo');

Route::get('/id{id}/audio', 'ProfileController@allAlbums')->name('allAlbums');
Route::get('/id{id}/audio/{album}', 'ProfileController@album')->name('album');
Route::post('/id{id}/audio/create', 'ProfileController@addProfileAlbums')->name('addProfileAlbums')->middleware('throttle:3,1440');
Route::patch('/id{id}/audio/{album}/update', 'ProfileController@updateAlbum')->name('updateAlbum');
Route::delete('/id{id}/audio/delete', 'ProfileController@deleteAlbums')->name('deleteAlbums');

Route::get('about', 'MainPageController@about')->name('about');
Route::get('rules', 'MainPageController@rules')->name('rules');
Route::get('reference', 'MainPageController@reference')->name('reference');

Route::get('/id{id}/events', 'ProfileController@events')->name('events');
Route::get('/id{id}/events/{event}', 'ProfileController@event')->name('event');
Route::post('/id{id}/events/addevent', 'ProfileController@addEvent')->name('addEvent')->middleware('throttle:10,1440');
Route::patch('/id{id}/events/{event}/edit', 'ProfileController@editEvent')->name('editEvent');
Route::delete('/id{id}/events/{event}/delete', 'ProfileController@deleteEvent')->name('deleteEvent');

Route::delete('/{id}/delete', 'ProfileController@deleteUser')->name('deleteUser');
Route::patch('/{id}/deletebanner', 'ProfileController@deleteBanner')->name('deleteBanner');

//Short link
Route::get('cc/{id}', 'ShortLinkController@shortLink')->name('shortLink');
Route::post('generate', 'ShortLinkController@generateShortLink')->name('generateShortLink');




























