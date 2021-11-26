<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'country', 'amount', 'prerequisites'];
    
    protected $casts = [
        'amount' => 'object',
        'prerequisites' => 'array'
    ];
}
