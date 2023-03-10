<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokovoucher extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function customer()
    {
    	return $this->hasOne('App\Models\Pengguna');
    }
}
