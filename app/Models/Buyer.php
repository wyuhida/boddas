<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Buyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected $table = 'buyers';
    protected $fillable = [
        'buyer',
        'stock_limit',
        'discount_percentage',
        'update_by',
        'target_penjualan',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
