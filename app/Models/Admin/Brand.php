<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','logo'];
    public function categoryDetails()
    {
        return $this->hasMany(CategoryDetail::class);
    }
    use HasFactory;
}
