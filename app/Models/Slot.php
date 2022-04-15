<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "is_available"
    ];

    public function STransacion(){
        return $this->hasOne(Transaction::class,"transaction_id","id");
    }
}
