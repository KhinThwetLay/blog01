<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $blogs=Blog::all();
    return view('blogs',[
        "blogs" => $blogs
    ]);
});
Route::get('/blogs/{blog}', function (Blog $blog) { // $blog=Blog::findOrFail($id);
    //route model binding 
    return view('blog',[
         "blog" => $blog
     ]
    );
})->where('blog','[A-z\d\_-]+');
