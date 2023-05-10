<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [];



 public function cart(){
    return $this->hasMany(Cart::class, 'idCart',);
  }

  public function category()
  {
      return $this->belongsTo(Category::class);
  }
  public function love()
  {
      return $this->belongsTo(Love::class);
  }
  public function comments()
  {
      return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
  }
  public function user()
  {
      return $this->belongsTo(User::class);
  }
  
}