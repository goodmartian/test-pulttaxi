<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const STATUS_NEW = 0;
    public const STATUS_IN_PROGRESS = 1;
    public const STATUS_CANCELED = 2;
    public const STATUS_COMPLETED = 3;

    public static function statusesList(): array
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_IN_PROGRESS => 'Выполняется',
            self::STATUS_CANCELED => 'Отменен',
            self::STATUS_COMPLETED => 'Завершён',
        ];
    }

    protected $fillable = [
        'address_from',
        'address_to',
        'calculated_cost_by_kilometers',
        'calculated_cost_by_minutes',
        'coordinate_from',
        'coordinate_to',
        'min_cost',
        'status',
        'total_cost'
    ];

    public function pricingPlan()
    {
        return $this->belongsTo(PricingPlan::class);
    }
}
