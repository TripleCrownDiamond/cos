<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'regular_price',
        'agency_id',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function renew()
    {
        return $this->belongsToMany(Formula::class);
    }
}
