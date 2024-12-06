<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    // Mass assignable fields
    protected $fillable = [
        'title',
        'description',
        'category',
        'file_path',
        'user_id',
        'approved',
    ];

    // Hujjatning izohlari bilan bog‘lanishi
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
