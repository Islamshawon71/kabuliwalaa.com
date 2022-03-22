<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'couriers';

    public static $searchable = [
        'courier_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'courier_name',
        'city_available',
        'zone_available',
        'delivery_charge',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
