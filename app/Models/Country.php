<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App\Models
 * @property string id
 * @property string name
 */
class Country extends Model
{
    use HasFactory, ApiResource;

    protected $keyType = 'string';
    public $incrementing = false;
}
