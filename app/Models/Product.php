<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight'
    ];
    public function estoque()
    {
        return $this->hasMany(Estoque::class);
    }
}
