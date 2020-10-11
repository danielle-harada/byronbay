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
      return $this->belongsTo("App\Model\seller", "id");
    }
}
