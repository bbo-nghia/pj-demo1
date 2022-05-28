<?php

namespace App\Services;

use App\Models\Shipment;

/**
 * Class ShipmentService
 * @package App\Services
 */
class ShipmentService extends BaseService
{

    /**
     * ShipmentService constructor.
     * @param Shipment $shipment
     */
    public function __construct(Shipment $shipment)
    {
        $this->model = $shipment;
    }
}
