<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'pric',
        'old_price',
        'image',
        'categorie_id',
    ];
    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function order()
    {
        return $this->belongsTo(order::class);
    }
}
