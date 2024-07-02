<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'f_name',
        'l_name',
        'address',
        'date_of_birth',
        'telephone_no',
        'gender',
        'size_of_homestead',
        'married',
        'children',
        'ages_of_children',
        'preferred_skills',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
