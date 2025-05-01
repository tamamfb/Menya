<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'stock', 'price', 'menu_type_id'];

    public function menuType()
    {
        return $this->belongsTo(MenuType::class);
    }
}

