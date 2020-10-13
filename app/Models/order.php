<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $table = "orders";
    public $primaryKey = "id";

    protected $fillable = [
      'user_id',
      'status'
    ];

    public function pedido(){
      return $this->hasMany('App\Models\pedido')
        ->select( \DB::raw('id, product_id, sum(total) as total, count(1) as quant') )//count pra ver quantos registros tem
        ->groupBy('product_id') //valor e qtde agrupado por produto
        ->orderBy('product_id', 'desc'); //ultimos criado aparecem primeiro
    }

    public static function consultaId($where){
      $order = self::where($where) -> first(['id']);
      return !empty($order->id) ? $order->id : null;
    }



  }
