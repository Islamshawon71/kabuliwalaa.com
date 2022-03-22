<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class SmsNotification extends Model
{
    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'sms_notifications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'number',
        'message',
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
