<?php

use App\Http\Controllers\Backend\ShipmentController;
use Tabuna\Breadcrumbs\Trail;

Route::group(
    [
        'prefix'     => 'shipment',
        'as'         => 'shipment.',
        'namespace'  => 'shipment',
        'middleware' => ['auth']
    ],
    function () {

        Route::get('/', [ShipmentController::class, 'index'])
             ->name('index')
             ->breadcrumbs(function (Trail $trail) {
                 $trail->parent('admin.dashboard')
                       ->push(__('Shipments'), route('admin.shipment.index'))
                 ;
             })
        ;

        Route::get('create', [ShipmentController::class, 'create'])
             ->name('create')
             ->breadcrumbs(function (Trail $trail) {
                 $trail->parent('admin.shipment.index')
                       ->push(__('Create Shipment'), route('admin.shipment.create'))
                 ;
             })
        ;

        Route::get('{shipment}/edit', [ShipmentController::class, 'edit'])
             ->name('edit')
             ->breadcrumbs(function (Trail $trail, \App\Models\Shipment $shipment) {
                 $trail->parent('admin.shipment.index')
                       ->push(__('Edit Shipment'), route('admin.shipment.edit', $shipment))
                 ;
             })
        ;
    }
);
