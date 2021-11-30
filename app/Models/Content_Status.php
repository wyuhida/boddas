<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_Status extends Model
{
    use HasFactory;
    protected $table = 'content_statuses';

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
