<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $table = "products";
    public $primaryKey = "id";
    public $timestamps = false;

    public function seller()
    {
      return $this->belongsTo('App\Models\seller', 'sellerId', 'user_id');
    }

    public function pedido()
    {
      return $this->belongsToMany('App\Models\pedido');
    }

}
