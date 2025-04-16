<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description','logo'];
    use HasFactory;
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
