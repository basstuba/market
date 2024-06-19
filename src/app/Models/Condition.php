<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'condition',
    ];

    public function items() {
        return $this->hasMany('App\Models\Item');
    }
}
