<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadorMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'menu_id',
    ];
    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
