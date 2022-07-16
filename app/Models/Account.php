<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $birthday
 * @property boolean $mail_flag
 * @property string $created_at
 * @property string $updated_at
 */
class Account extends Model
{
    use HasApiTokens;

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'mobile', 'birthday', 'mail_flag', 'created_at', 'updated_at'];
}
