<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_Status extends Model
{
    use HasFactory;
    protected $table = 'transaction__statuses';

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
