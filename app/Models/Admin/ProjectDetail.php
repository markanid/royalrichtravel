<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $fillable = ['project_id', 'name', 'type', 'image'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    use HasFactory;
}
