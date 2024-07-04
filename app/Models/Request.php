<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'employer_id',
        'domestic_worker_id',
        'status',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function domesticWorker()
    {
        return $this->belongsTo(DomesticWorker::class, 'domestic_worker_id');
    }
}

