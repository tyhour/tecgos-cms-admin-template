<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

function convertArrayToObject($data)
{
    return collect($data)->map(function ($item) {
        return (object) $item;
    });
}

function storeImage($path, $image)
{
    if (!$image) return null;

    $img = ImageManagerStatic::make($image)->encode('jpg');
    $name = $path . Str::random() . '-image.jpg';
    Storage::disk('public')->put($name, $img);
    return $name;
}

function convert($value)
{
    return  $value ? "$" . number_format($value, 2) : "-";
}

function slug($value)
{
    return  Str::slug($value);
}
