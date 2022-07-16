<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $account_id
 * @property string $original_file_name
 * @property string $main_file_name
 * @property string $thumb_file_name
 * @property string $created_at
 * @property string $updated_at
 */
class AccountPicture extends Model
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
    protected $fillable = ['account_id', 'original_file_name', 'main_file_name', 'thumb_file_name', 'created_at', 'updated_at'];
}
