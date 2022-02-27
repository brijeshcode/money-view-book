<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	protected $fillable = ['type', 'name', 'color', 'class_or_path', 'icon_type' ];

	public function expenses(){
        return $this->hasMany(Expense::class, 'category_id' , 'id');
	}

	public function mostUsedExpense()
	{
		return Expense::where('category_id' , $this->id);
		// return $this->hasMany(Expense::class, 'category_id' , 'id')->groupBy('category_id')->count('id');
	}
}
