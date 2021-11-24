<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';

    public function transaction_detail()
    {
        return $this->hasMany(Transaction_Detail::class, 'id_item');
    }
}
