<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = false;
    protected $fillable = ['title', 'slug'];
    public function news(){
      return $this->hasMany(News::class, 'category_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
