<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'telephone',
        'numero_abonne',
        'other_id',
        'user_id',
    ];
    use HasFactory;

    public function renew () {
        return $this->belongsToMany(Renew::class);
    }
}
