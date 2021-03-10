<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $directory = '/images/';

    protected $fillable = ['photo_path'];

    public function getPhotoPathAttribute($value)
    {
        return $this->directory . $value;
    }
}
