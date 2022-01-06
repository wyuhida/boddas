<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [
        'address_name,latitute,longitute,id_user,created_at,updated_at,update_by,is_default',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
