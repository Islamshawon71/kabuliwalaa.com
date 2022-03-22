<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Auditable;

    public const DISCOUNT_TYPE_SELECT = [
        'Price'      => 'Price',
        'Percentage' => 'Percentage',
        'Coupon'     => 'Coupon',
    ];

    public $table = 'orders';

    public static $searchable = [
        'invoice',
        'memo',
    ];

    protected $dates = [
        'confirm_date',
        'delivery_date',
        'complete_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'wpid',
        'invoice',
        'memo',
        'courier_id',
        'city_id',
        'zone_id',
        'delivery',
        'discount_type',
        'discount',
        'total',
        'paid',
        'confirm_date',
        'delivery_date',
        'complete_date',
        'status',
        'note',
        'user_id',
        'customer_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function getConfirmDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setConfirmDateAttribute($value)
    {
        $this->attributes['confirm_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDeliveryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCompleteDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCompleteDateAttribute($value)
    {
        $this->attributes['complete_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
