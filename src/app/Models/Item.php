<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'condition_id',
        'item_name',
        'explanation',
        'price',
        'img_url',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function condition() {
        return $this->belongsTo('App\Models\Condition');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function soldItems() {
        return $this->hasMany('App\Models\SoldItem');
    }

    public function categories() {
        return $this->belongsToMany('App\Models\Category', 'category_items');
    }

    public static function recommendItem() {
        return Item::withCount('likes')->orderBy('likes_count', 'desc')->take(10)->get();
    }

    public function scopeKeywordSearch($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('item_name', 'like', '%' . $keyword . '%');
        }
    }

    public function scopeCategorySearch($query, $keyword) {
        if(!empty($keyword)) {
            $query->whereHas('categories', function($query) use ($keyword) {
                $query->where('category', 'like', '%' . $keyword . '%');
            });
        }
    }
}
