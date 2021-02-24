<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoSlider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'btn', 'btn_link', 'photo'];
}
