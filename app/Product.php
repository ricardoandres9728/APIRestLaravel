<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $dates = ['delete_at'];

    const PRODUCTO_DISPONIBLE = 1;
    const PRODUCTO_NO_DISPONIBLE = 0;

    protected $fillable = [
        "name",
        "description",
        "quantity",
        "status",
        "image",
        "seller_id",
    ];

    public function estaDisponible()
    {
        return $this->status == Product::PRODUCTO_DISPONIBLE;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
