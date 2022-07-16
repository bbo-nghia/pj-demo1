<?php

use App\Http\Controllers\Api\v1\AccountController;

Route::namespace('v1')
    ->group(
        function () {
            Route::prefix('account')
                ->group(
                    function () {
                        Route::group(['middleware' => ['auth:sanctum']], function () {
                            Route::get('/', [AccountController::class, 'fetch'])->name('v1.account.fetch');
                            Route::patch('/', [AccountController::class, 'update'])->name('v1.account.update');
                        });
                    }
                );
        }
    );
