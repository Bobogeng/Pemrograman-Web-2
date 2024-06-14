<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';
    protected $fillable = ['id', 'nama'];

    public $timestamps = false;

    public function paramedik(): HasMany
    {
        return $this->hasMany(Paramedik::class);
    }
}
