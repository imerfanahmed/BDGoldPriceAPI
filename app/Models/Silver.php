<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silver extends Model
{
    use HasFactory;
    protected $table = 'silvers';
   //fillable
    protected $fillable = [
        'k18',
        'k21',
        'k22',
        'traditional',
    ];

    protected $hidden = [
        'id',
        'updated_at',
    ];

    protected $casts = [
        'k18' => 'float',

        'k21' => 'float',

        'k22' => 'float',

        'traditional' => 'float',

        'created_at' => 'datetime:Y-m-d',
    ];
}
