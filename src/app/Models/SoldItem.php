<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user-id',
        'item_id',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }
}
