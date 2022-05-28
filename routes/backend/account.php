<?php

use App\Http\Controllers\Backend\AccountController;
use Tabuna\Breadcrumbs\Trail;

Route::group(
    [
        'prefix'     => 'account',
        'as'         => 'account.',
        'namespace'  => 'account',
        'middleware' => ['auth']
    ],
    function () {

        Route::get('/', [AccountController::class, 'index'])
             ->name('index')
             ->breadcrumbs(function (Trail $trail) {
                 $trail->parent('admin.dashboard')
                       ->push(__('Accounts'), route('admin.account.index'))
                 ;
             })
        ;

        Route::get('/address', [AccountController::class, 'address'])
             ->name('address')
             ->breadcrumbs(function (Trail $trail) {
                 $trail->parent('admin.account.index')
                       ->push(__('Address'), route('admin.account.address'))
                 ;
             })
        ;

        Route::get('/address/create', [AccountController::class, 'addressCreate'])
             ->name('address-create')
             ->breadcrumbs(function (Trail $trail) {
                 $trail->parent('admin.account.address')
                       ->push(__('Address Create'), route('admin.account.address-create'))
                 ;
             })
        ;

        Route::get('/address/detail', [AccountController::class, 'addressDetail'])
             ->name('address-detail')
             ->breadcrumbs(function (Trail $trail) {
                 $trail->parent('admin.account.address')
                       ->push(__('Address Detail'), route('admin.account.address-detail'))
                 ;
             })
        ;

        Route::get('create', [AccountController::class, 'create'])
             ->name('create')
             ->breadcrumbs(function (Trail $trail) {
                 $trail->parent('admin.account.index')
                       ->push(__('Create Account'), route('admin.account.create'))
                 ;
             })
        ;

        Route::get('{account}/edit', [AccountController::class, 'edit'])
             ->name('edit')
             ->breadcrumbs(function (Trail $trail, \App\Models\Account $account) {
                 $trail->parent('admin.account.index')
                       ->push(__('Edit Account'), route('admin.account.edit', $account))
                 ;
             })
        ;
    }
);
