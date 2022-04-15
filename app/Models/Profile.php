<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "is_male",
    ];

    public function User(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
