<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viveiro extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'width',
        'lenght',
        'area'
    ]; 

    public function biometrias()
    {
        return $this->hasMany(Biometria::class);
    }
    
}
