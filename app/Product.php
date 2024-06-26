<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'type', 'mark');
    }
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
