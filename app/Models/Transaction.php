<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    Public function Slot(){
        return $this->hasOne(Slot::class,"slot_id","id");
    }

    Public function Tdetails(){
        return $this->hasMany(Transaction_detail::class,"Transaction_id","id");
    }
}
