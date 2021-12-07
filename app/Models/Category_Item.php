<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Item extends Model
{
    use HasFactory;
    protected $table = 'category__items';

    public function items()
    {
        return $this->belongsToMany(Item::class, 'id_category_item');
    }
}
