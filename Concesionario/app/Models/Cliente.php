<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'email', 'telefono','user_id'];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
