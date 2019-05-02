<?php


use App\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// EXAMPLE FOR /contact page using Route->Controller->View
// we create Route that will look in Http/Controllers/PostsController and then method contact

Route::get('/contact/{id}/{name}', 'PostsController@contact');


/*
|--------------------------------------------------------------------------
| CRUD Application Routes for a FORM
|--------------------------------------------------------------------------
*/



//// All the Route in Laravel by default are grouped in middleware like this:
//Route::group(['middleware' => ['web']], function () {

Route::resource('/posts', 'PostsController');


Route::get('/dates', function (){


    $date = new DateTime();

    echo $date->format("d-m-Y");

    echo "<br>";

    //// below use Carbon\Carbon

    echo Carbon::now()->addDays(10)->diffForHumans();

    echo "<br>";

    echo Carbon::now()->subMonths(5)->diffForHumans();

    echo "<br>";

    echo Carbon::now()->yesterday()->diffForHumans();

    echo "<br>";

    echo Carbon::now()->yesterday();

    echo "<br>";

});



// Accessor in User model will capitalize all the letters
Route::get('/getname', function (){

    $user = User::findOrFail(1);

    echo $user->name;

});


// Mutator will apply ukwords() in User when create data
Route::get('/adduser', function (){

    $user = User::create(['name'=>'peter cuba', 'email'=>'peter@cuba.com', 'password'=>'321']);

    return $user;

});


// Mutator added in User->setNameAttribute($value) when update data
Route::get('/setname', function (){

    $user = User::findOrFail(2);

    $user->name = "william";

    $user->save();

});



//});




