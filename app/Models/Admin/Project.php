<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','logo'];
    public function projectdetails()
    {
        return $this->hasMany(ProjectDetail::class);
    }
    use HasFactory;
}
