<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory, ApiResource, UUID;

    protected $fillable = ['postcode', 'phone', 'city', 'street', 'house', 'note', 'name'];
}
