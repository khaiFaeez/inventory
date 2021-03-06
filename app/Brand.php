<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $table = 'brand';
    protected $fillable = ['name'];
    public function products() {
        return $this->hasMany('App\Brand');
    }
}
