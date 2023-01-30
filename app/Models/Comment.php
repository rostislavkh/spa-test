<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parrent_id',
        'name',
        'email',
        'url',
        'file',
        'comment',
    ];

    public function parrent() {
        return $this->belongsTo(Comment::class, 'parrent_id');
    }

    public function childs() {
        return $this->hasMany(Comment::class, 'parrent_id');
    }
}
