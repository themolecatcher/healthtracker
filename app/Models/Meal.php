<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $guarded = ['symptoms'];

    public function symptoms() {
        return $this->belongsToMany(Symptom::class);
    }
}
