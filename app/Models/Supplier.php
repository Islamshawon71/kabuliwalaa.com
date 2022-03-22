<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'suppliers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'supplier_name',
        'supplier_phone',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function supplierPurchases()
    {
        return $this->hasMany(Purchase::class, 'supplier_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
