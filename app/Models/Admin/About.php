<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['welcome','glimbse','our_journey','vision','mission','our_values','image'];
    use HasFactory;
}
