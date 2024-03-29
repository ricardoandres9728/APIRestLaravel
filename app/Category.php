<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable = [
        "name",
        "description"
    ];

    public function products()
    {
        return $this -> belongsToMany(Product::class);
    }

    public function seller()
    {
        return $this -> belongsTo(Seller::class);
    }

    public function transactions(){
        return $this -> hasMany(Transaction::class);
    }
}
