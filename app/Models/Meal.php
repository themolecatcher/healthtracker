<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function symptoms() {
        return $this->belongsToMany(Symptom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
