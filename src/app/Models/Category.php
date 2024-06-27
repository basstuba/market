<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'category',
    ];

    public function items() {
        return $this->belongsToMany('App\Models\Item', 'category_items');
    }

    public function scopeCategoriesSearch($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('category', 'like', '%' . $keyword . '%');
        }
    }
}
