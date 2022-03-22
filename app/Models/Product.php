<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    use Auditable;

    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'products';

    public static $searchable = [
        'name',
        'code',
    ];

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'code',
        'regular_price',
        'sale_price',
        'description',
        'brand_id',
        'priority',
        'status',
        'seo_content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function productPurchases()
    {
        return $this->hasMany(Purchase::class, 'product_id', 'id');
    }

    public function productsOrders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(ProductTag::class, 'brand_id');
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
