<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlatform extends Model
{


    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "payment_platform";
    protected $fillable = [
        'name',
        'image',
        'suscriptions_enabled'
    ];
}
