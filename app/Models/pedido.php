<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $fillable = [
      'order_id',
      'product_id',
      'status',
      'total'
    ];

      public function produto(){
      return $this->belongsTo('App\Models\product', 'product_id', 'id');
    }

    public function order(){
    return $this->belongsTo('App\Models\order', 'product_id', 'id');
  }


}
