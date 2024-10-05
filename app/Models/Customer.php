<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Pastikan menggunakan Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'nisn', 'password', 'class'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
