<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'news';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
