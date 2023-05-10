<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class NhapXuatKho extends Model
{
    use HasFactory;
    protected $table = 'nhapxuatkho';
    protected $fillable = [];
    public static function productID($id)
    {
        return Product::find($id);
    }
}
