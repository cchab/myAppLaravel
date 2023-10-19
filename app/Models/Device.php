<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ["device_id",
    "date",
    "temperatura_int",
    "temperatura_ext",
    "humedad",
    "poblacion_med",
    "caja_oc"];
}
