<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $account_id
 * @property integer $address_id
 * @property boolean $status
 * @property string $shipped_date
 * @property string $created_at
 * @property string $updated_at
 */
class Shipment extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['account_id', 'address_id', 'status', 'shipped_date', 'created_at', 'updated_at'];
}
