<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'cities';

    public static $searchable = [
        'city_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'courier_name_id',
        'city_name',
        'status',
        'extras',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function courier_name()
    {
        return $this->belongsTo(Courier::class, 'courier_name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
