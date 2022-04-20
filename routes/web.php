<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    // $blogs=Blog::all();
    // DB::listen(function($query){
    //     logger($query->sql);//logger is same to log::info('affff');
    // });
    return view('blogs',[
        "blogs" =>Blog::all()// Blog::with('category','author')->get()//with() is called lazay loading or eager loader
    ]);
});
Route::get('/blogs/{blog:slug}', function (Blog $blog) { // $blog=Blog::findOrFail($id);
    //route model binding 
    return view('blog',[
         "blog" => $blog
     ]
    );
})->where('blog','[A-z\d\_-]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs',[
        "blogs" => $category->blogs
    ]);
});

Route::get('/users/{user}', function (User $user) {
   
    return view('blogs',[
        "blogs" => $user->blogs
    ]);
});