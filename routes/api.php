<?php

declare(strict_types=1);

use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\Route;
use Lightit\Authentication\App\Controllers\LoginController;
use Lightit\Authentication\App\Controllers\LogoutController;
use Lightit\Authentication\App\Controllers\RefreshController;
use Lightit\Features\App\Controllers\ListFeaturesController;
use Lightit\Users\App\Controllers\{GetUserController, DeleteUserController, ListUserController, StoreUserController, UpdateUserController};

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

Route::middleware('auth:sanctum')
    ->get('/me', function (#[CurrentUser] $user) {
        return response()->json([
            'data' => $user,
        ]);
    });

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:api'])->group(static function (): void {
    Route::prefix('users')->group(static function (): void {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)
            ->withTrashed()
            ->whereNumber('user');
        Route::post('/', StoreUserController::class);
        Route::put('/{user}', UpdateUserController::class)
            ->whereNumber('user');
        Route::delete('/{user}', DeleteUserController::class)
            ->whereNumber('user');
    });
});
Route::get('/features', ListFeaturesController::class);

Route::prefix('auth')->group(static function (): void {
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
    Route::post('refresh', RefreshController::class);
});
