<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
        use HasFactory;
        protected $fillable = [
            "name",
            "category_id"
        ];
    
        public function Foods(){
            return $this->hasMany(Food::class, "category_id", "id");
        }
        public function Parent(){
            return $this->belongsTo(Category::class, "category_id", "id");
        }
    
}
