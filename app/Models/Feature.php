<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getIconPathAttribute()
    {
        return Storage::url($this->icon);
    }
}
