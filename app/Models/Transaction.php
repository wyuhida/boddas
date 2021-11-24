<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    public function transaction_detail()
    {
        return $this->hasMany(Transaction_Detail::class);
    }

    public function transaction_status()
    {
        return $this->belongsTo(Transaction_Status::class);
    }
}
