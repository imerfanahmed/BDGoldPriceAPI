<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Gold extends Model
{
    use HasFactory;
    protected $table = 'golds';
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

    // public function setCreatedAtAttribute($value)
    // {
    //     $this->attributes['created_at'] = Carbon::createFromFormat('d-m-y H:i:s', $value)->format('Y-m-d H:i:s');
    // }
}
