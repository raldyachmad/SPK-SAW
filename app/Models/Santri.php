<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    /** @use HasFactory<\Database\Factories\SantriFactory> */
    use HasFactory;

    protected $fillable = ['nama', 'jenis_kelamin'];

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
    protected static function booted()
    {
        static::deleting(function ($santri) {
            $santri->penilaians()->delete();
        });
    }
}
