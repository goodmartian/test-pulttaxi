<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_cost',
        'cost_per_kilometer',
        'cost_per_minute',
        'free_kilometers_amount',
        'free_minutes_amount',
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
