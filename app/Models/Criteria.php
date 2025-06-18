<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    /** @use HasFactory<\Database\Factories\CriteriaFactory> */
    use HasFactory;

    protected $fillable = ['nama', 'bobot', 'atribut'];
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'criteria_id');
    }
}
