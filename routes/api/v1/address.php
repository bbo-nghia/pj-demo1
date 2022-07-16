<?php

use App\Http\Controllers\Api\v1\AddressController;

Route::namespace('v1')
    ->group(
        function () {
            Route::prefix('address')
                ->group(
                    function () {
                        Route::group(['middleware' => ['auth:sanctum']], function () {
                            Route::get('/{addressId}', [AddressController::class, 'fetch'])->name('v1.address.fetch');
                            Route::get('/', [AddressController::class, 'fetchAll'])->name('v1.address.fetch-all');
                            Route::post('/', [AddressController::class, 'store'])->name('v1.address.store');
                            Route::patch('/{addressId}', [AddressController::class, 'update'])->name('v1.address.update');
                            Route::delete('/{addressId}', [AddressController::class, 'delete'])->name('v1.address.delete');
                        });
                    }
                );
        }
    );
