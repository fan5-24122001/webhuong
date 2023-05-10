<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Love extends Model
{
    use HasFactory;
    protected $table = 'love';
    protected $fillable = [ 
        'id_product',
        'id_user'
    ];
  
}
