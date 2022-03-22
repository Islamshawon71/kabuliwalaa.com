<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Auditable;

    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'Bkash Merchant'   => 'Bkash Merchant',
        'Bkash Send Money' => 'Bkash Send Money',
        'Nagad'            => 'Nagad',
        'Sure Cash'        => 'Sure Cash',
        'Rocket'           => 'Rocket',
        'Load'             => 'Load',
        'Bank'             => 'Bank',
    ];

    public $table = 'payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'payment_type',
        'number',
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
