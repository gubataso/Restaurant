<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Transaction_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        "price",
        "quiantity",

    ];
    public function Transacion(){
        return $this->hasOne(Transaction::class,"transaction_id","id");
    }
}
