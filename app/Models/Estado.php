<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Confirmado;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['poblacion','nombre','code'];

    public function confirmados(): HasMany
    {
        return $this->hasMany(Confirmado::class);
    }
}
