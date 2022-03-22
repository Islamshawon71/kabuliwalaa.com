<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customerOrders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
