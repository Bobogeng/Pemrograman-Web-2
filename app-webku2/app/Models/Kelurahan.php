<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $fillable = ['id', 'nama'];

    public $timestamps = false;

    public function pasien(): HasMany
    {
        return $this->hasMany(Pasien::class);
    }
}
