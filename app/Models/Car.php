<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'gov_number',
        'color',
        'manufacture_year',
        'driver_id',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function pricingPlans()
    {
        return $this->belongsToMany(PricingPlan::class);
    }
}
