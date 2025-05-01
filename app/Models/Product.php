<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\User;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
	use HasFactory, Sortable;

	protected $fillable = [
		'name',
		'description',
		'price',
		'category_id',
		'image',
		'recommend_flag',
		'carriage_flag',
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function reviews()
	{
		return $this->hasMany(Review::class);
	}

	public function favorited_users()
	{
		return $this->belongsToMany(User::class)->withTimestamps();
	}

	public function getAverageScoreAttribute()
	{
		$avg = $this->reviews->avg('score');
		return $avg ? round($avg, 1) : null;
	}

	public function getRoundedScoreAttribute()
	{
		$avg = $this->reviews->avg('score');
		return $avg ? round($avg * 2) / 2 : null;
	}
}
