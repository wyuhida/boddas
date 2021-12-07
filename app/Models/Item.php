<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    use SoftDeletes;
    public function transaction_detail()
    {
        return $this->hasMany(Transaction_Detail::class, 'id_item');
    }

    public function categories()
    {
        return $this->hasMany(Transaction_Detail::class, 'id_category_item');
    }
}
