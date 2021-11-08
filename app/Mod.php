<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mod extends Model
{
    use SoftDeletes;
    protected $table = 'model';
    protected $fillable = ['name'];
    public function products() {
        return $this->hasMany('App\Mod');
    }
}
