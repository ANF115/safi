<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'empresa_id',
        'year',
        'ratio_id',
        'respuesta'
        
        
    ];

    public function empresa()
    {
        return $this->belongsTo(User::class);
    }

    public function ratio()
    {
        return $this->belongsTo(Ratio::class);
    }
}
