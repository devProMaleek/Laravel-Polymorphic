<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Photo;
use App\Models\Country;
use App\Models\Post;
use App\Models\Role;


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
Route::get('/eloquent/insert', function (){
    $store = new Post;

    $store->Brand = 'Adidas';
    $store->Price = 200;
    $store->Shoe_Name = 'Adidas Office shoe';
    $store->Shoe_size = 45;

    $store->save();
    return "Insert Successful";
});
Route::get('insert/countries', function (){
    $country = new Country;

    $country->name = "Ghana";

    $country->save();
    return "inserted Successfully";
});
Route::get('insert/photos', function () {
//    $photo = new Photo;

    $user = User::find(1);

    $user->photos()->create([
        'path' => 'abimbola.jpg'
    ]);
});
Route::get('/insert/picture', function(){
   $photo = new Photo;

   $photo->path = "dabimbola.jpg";
   $photo->imageable_id = 1;
   $photo->imageable_type = 'Post::class';
   $photo->save();

    return "Inserted Successfully";
});
//
//
//    $photo->save();

Route::get('insert/role', function (){
    $roles = new Role;

    $roles->name = "Subscriber";
    $roles->save();
    return "Inserted Successfully";
});
Route::get('insert/role_user', function (){
    DB::insert ('insert into role_user(user_id, role_id) values (?, ?)', [2, 2 ]);
    return 'Success';
});
Route::get('insert/user', function (){
    $user = new User;

    $user->name = "Adebayo Abimbola";
    $user->email = "haleemahadbay@gmail.com";
    $user->password = "maleekbaryor07";
    $user->country_id = 2;

    $user->save();
    return "Insert Successful";
});
Route::get('photos/update', function (){
    $photos = Photo::find(1);

    $photos->imageable_type = "User::class";

    $photos->save();
    return "Updated";
});
// Polymorphic Relation
Route::get('user/photoes', function (){
    $photo = Photo::find(5);
    return $photo->imageable;
});
Route::get('photos/{id}/post', function ($id){
    $photo = Photo::findOrFail($id);
    return $photo->imageable;
});
