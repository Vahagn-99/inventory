<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::any('/unauthorized', fn() => response()->json('unauthorized', 401));
Route::any('/not-allowed', fn() => response()->json('action not allowed', 403));

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::post('/inventories/import', [InventoryController::class, 'import']);
    Route::post('/inventories/export', [InventoryController::class, 'export']);
    Route::apiResource('/inventories', InventoryController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/sections', SectionController::class);
    Route::middleware('super-admin')->apiResource('/users', UserController::class);
});
