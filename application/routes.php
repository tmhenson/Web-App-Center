<?php


/*Route::get('/', function()
{
	return View::make('home.index');
});*/
Route::controller(Controller::detect());

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});


Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('home');
});

Route::filter('nonauth', function()
{
	if (Auth::guest() == false) return Redirect::to('dashboard');
});