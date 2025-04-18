<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
