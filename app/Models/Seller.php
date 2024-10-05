<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'contact', 'username', 'password'];

    public function store()
    {
        return $this->hasOne(Store::class);
    }
}
