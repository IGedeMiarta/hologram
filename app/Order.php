<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getClient(){
        return $this->belongsTo(Client::class,'client');
    }
    public function getKasir(){
        return $this->belongsTo(User::class,'cashier_id');
    }
    public function statusInfo()
    {
        if($this->status == 1)
        {
            return '<span class="badge badge-pill badge-warning">Process</span>';
        }elseif($this->status==2){
            return '<span class="badge badge-pill badge-success">Selesai</span>';
        }else{
             return '<span class="badge badge-pill badge-danger">Canceled</span>';
        }
    }
}
