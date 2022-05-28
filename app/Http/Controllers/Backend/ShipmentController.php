<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ShipmentService;


/**
 * Class ShipmentController
 * @package App\Http\Controllers\Backend
 */
class ShipmentController extends Controller
{
    /**
     * @var ShipmentService
     */
    protected $shipmentService;

    /**
     * ShipmentController constructor.
     * @param ShipmentService $shipmentService
     */
    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.shipment.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.shipment.create');
    }
}
