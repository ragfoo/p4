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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lenses', 'LensController@index')->name('lenses.index');
Route::get('/lenses/brands', 'LensController@brands')->name('lenses.brands');
Route::post('/lenses/brands', 'LensController@brands')->name('lenses.brands');
Route::get('/lenses/{brand}', 'LensController@models')->name('lenses.models');
Route::get('/lenses/{brand}/{model}', 'LensController@details')->name('lenses.details');
Route::post('/lenses', 'LensController@store')->name('lenses.store');
Route::post('/lenses/collection', 'LensController@store')->name('lenses.store');
//Route::get('/lenses/{lens}', 'LensController@show')->name('lenses.show');
//Route::get('/lenses/{lens}/edit', 'LensController@edit')->name('lenses.edit');
//Route::put('/lenses/{lens}', 'LensController@update')->name('lenses.update');
//Route::delete('/lenses/{lens}', 'LensController@destroy')->name('lenses.destroy');


Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database moviemakers');
        DB::statement('CREATE database moviemakers');

        return 'Dropped foobooks; created moviemakers.';
    });

};

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user)
        dump($user->toArray());
    else
        dump('You are not logged in.');

    return;
});
