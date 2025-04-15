<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Services\ImageUploadService;


class About extends Model
{
    use HasFactory;
    
    protected $fillable = ['welcome', 'glimbse', 'our_journey', 'vision', 'mission', 'our_values', 'image'];
}
