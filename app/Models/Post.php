<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo('App\models\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\models\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\models\Category');
    }
}
