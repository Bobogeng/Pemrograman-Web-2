<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = ['id', 'kode', 'nama', 'tmp_lahir', 'tgl_lahir', 'gender', 'email', 'alamat', 'kelurahan_id'];

    public $timestamps = false;

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function periksa(): HasMany
    {
        return $this->hasMany(Periksa::class);
    }
}
