<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SeoManage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImagePathAttribute()
    {
        return Storage::url($this->image);
    }
}
