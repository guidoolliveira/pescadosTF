<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viveiro extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // Nome do viveiro

    // Relacionamento: um Viveiro pode ter muitas Biometrias
    public function biometrias()
    {
        return $this->hasMany(Biometria::class);
    }
    
}
