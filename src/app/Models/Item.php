<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user-id',
        'condition_id',
        'name',
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

    public function myListItem($user) {
        return Item::where('user_id', $user['id'])->get();
    }
}
