<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'zones';

    public static $searchable = [
        'zone_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'courier_name_id',
        'city_name_id',
        'zone_name',
        'status',
        'extra',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function courier_name()
    {
        return $this->belongsTo(Courier::class, 'courier_name_id');
    }

    public function city_name()
    {
        return $this->belongsTo(City::class, 'city_name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
