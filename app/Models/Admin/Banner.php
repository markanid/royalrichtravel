<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['banner','banner_label'];
    protected $casts = [
        'banner' => 'array',
    ];
    use HasFactory;
}
