<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user-id',
        'postcode',
        'address',
        'building',
        'img_url',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
