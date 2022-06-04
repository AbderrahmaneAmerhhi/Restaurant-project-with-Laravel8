<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        //'slug',
        'Visibility'
    ];
    /* public function getRouteKeyName()
    {
        return 'slug';
    }*/

    // relation with menu
    public function Menus()
    {
        return $this->hasMany(Menu::class);
    }
}
