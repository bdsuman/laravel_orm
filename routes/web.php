<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(PostController::class)->group(function () {
    Route::get('/','allPost');

    Route::get('category-post-count/{category_id}', 'categoryPostCount');
    Route::get('posts/{id}/delete', 'delete');
    Route::get('posts/trash', 'allSoftDeletedRows');
   
    Route::get('/categories/{id}/posts', 'categoryWisePost');
    Route::get('/categories/{id}/latestpost',  'categoryWiseLatestPost');
    Route::get('/categories',  'CategoriesLatestPosts');

});
