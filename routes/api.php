<?php
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::apiResource('movies', MovieController::class);
Route::apiResource('blog-posts', BlogPostController::class);
