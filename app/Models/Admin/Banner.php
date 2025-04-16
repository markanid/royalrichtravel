<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['banner'];
    protected $casts = [
        'banner' => 'array',
    ];
    use HasFactory;
}
