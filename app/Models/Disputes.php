<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disputes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'role', 'subject', 'description', 'status'];

    public function resolutions()
    {
        return $this->hasMany(DisputeResolution::class);
    }
}
