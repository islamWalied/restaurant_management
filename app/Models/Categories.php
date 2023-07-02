<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'image',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, "category_menu","category_id",);
    }
}
