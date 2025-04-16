<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = ['about_id','title','description','status'];
    public function about()
    {
        return $this->belongsTo(About::class,'about_id');
    }
    use HasFactory;
}
