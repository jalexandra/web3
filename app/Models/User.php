<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class User
 * @package App\Models
 * @property string id
 * @property string name
 * @property string email
 * @property string password
 * @property string billing_id
 * @property Address billing
 * @property string shipping_id
 * @property Address shipping
 * @property string remember_token
 * @property \DateTime email_verified_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, ApiResource, UUID;

    protected $fillable = [
        'name', 'email', 'password', 'billing_id', 'shipping_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_id');
    }

    public function billing(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

}
