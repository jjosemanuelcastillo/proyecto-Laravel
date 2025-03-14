<?php

namespace App\Models;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $fillable = ['marca', 'modelo', 'anio', 'precio', 'stock'];
    public function ventas(){
        return $this->hasMany(Venta::class);
    }
}
