<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
          'description', 'product_category_id', 'price', 'stock', 'stock_defective', 'serial_number', 'brand_id', 'model_id', 'client_id','name'
    ];

    public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id')->withTrashed();
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id')->withTrashed();
    }
    public function model()
    {
        return $this->belongsTo('App\Mod', 'model_id')->withTrashed();
    }
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id')->withTrashed();
    }

    public function solds()
    {
        return $this->hasMany('App\SoldProduct');
    }

    public function receiveds()
    {
        return $this->hasMany('App\ReceivedProduct');
    }
}
