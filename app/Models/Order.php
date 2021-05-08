<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Order
 * @package App\Models
 * @property string shipping_id
 * @property string billing_id
 * @property Address shipping
 * @property Address billing
 * @property int status_num
 * @property string status
 */
class Order extends Model
{
    use HasFactory, ApiResource, UUID;

    protected $fillable = ['shipping_id', 'billing_id', 'status_num'];

    protected $appends = ['status'];

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_id');
    }

    public function billing(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_id');
    }

    public function getStatusAttribute(): string
    {
        return match ($this->status_num) {
            0 => 'Processing',
            1 => 'Packing',
            2 => 'On route',
            3 => 'Completed',
            4 => 'Cancelled by customer',
            5 => 'Cancelled by us',
            default => '',
        };
    }

    public function setStatusAttribute($value): int
    {
        return match ($value) {
            'Processing' => 0,
            'Packing' => 1,
            'On route' => 2,
            'Completed' => 3,
            'Cancelled by customer' => 4,
            'Cancelled by us' => 5,
            default => 9,
        };
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'bunches')->withPivot('amount');
    }
}
