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

    public function categoryItems() {
        return $this->belongsToMany('App\Models\Category');
    }
}
