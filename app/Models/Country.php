<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'c_id'
    ];

    public function capital()
    {
        return $this->hasOne(Capital::class,'id','c_id');
    }
}
