<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'transactions';
	protected $fillable = [
		'transaction_title',
		'date',
		'transaction_type',
		'amount',
		'category_id',
		'updated_by',
		'added_by'
	];

	public function category()
	{
        return $this->belongsTo(Category::class);
	}
}
