<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisputeResolution extends Model
{
    use HasFactory;

    protected $fillable = ['dispute_id', 'resolution_description'];

    public function dispute()
    {
        return $this->belongsTo(Disputes::class);
    }
}
