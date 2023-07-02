<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'price',
        'image',
    ];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, "category_menu","menu_id","category_id");
    }

}
