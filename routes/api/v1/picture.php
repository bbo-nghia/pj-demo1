<?php

use App\Http\Controllers\Api\v1\PictureController;

Route::namespace('v1')
    ->group(
        function () {
            Route::prefix('picture')
                ->group(
                    function () {
                        Route::group(['middleware' => ['auth:sanctum']], function () {
                            Route::get('/{pictureId}', [PictureController::class, 'fetch'])->name('v1.picture.fetch');
                            Route::get('/', [PictureController::class, 'fetchAll'])->name('v1.picture.fetch-all');
                            Route::post('/', [PictureController::class, 'upload'])->name('v1.picture.upload');
                            Route::delete('/', [PictureController::class, 'delete'])->name('v1.picture.delete');
                        });
                    }
                );
        }
    );
