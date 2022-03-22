<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    public const STATUS_SELECT = [
        'Pending' => 'Pending',
        'Restock' => 'Restock',
        'Cancel'  => 'Cancel',
    ];

    public $table = 'product_requests';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_note',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
