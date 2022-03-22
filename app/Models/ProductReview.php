<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    public const STATUS_SELECT = [
        'Pending'  => 'Pending',
        'Approved' => 'Approved',
        'Spam'     => 'Spam',
    ];

    public $table = 'product_reviews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_id',
        'stars',
        'comments',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
