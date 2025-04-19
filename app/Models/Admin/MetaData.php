<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    protected $table = 'meta_datas';
    protected $fillable = ['title','desciption','keyword','og_image'];
    use HasFactory;
}
