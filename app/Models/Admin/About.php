<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['aboutus','vision','services','focus','projects','satisfaction','image1','image2'];
    public function missions()
    {
        return $this->hasMany(Mission::class,'about_id');
    }
    use HasFactory;
}
