<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	protected $fillable = ['type', 'name', 'color', 'class_or_path', 'icon_type' ];
}
