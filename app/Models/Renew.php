<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renew extends Model
{
    protected $fillable = [
        'formula_id',
        'customer_id',
        'user_id',
        'duration',
        'agency_id',
    ];

    use HasFactory;

    public function formula() {
        return $this->hasOne(Formula::class);
    }

    public function customer() {
        return $this->hasOne(Customer::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agency() {
        return $this->hasOne(Agency::class);
    }
}
