<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'comment',
        'user_id',
        'status',
        'deleted_at'
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
