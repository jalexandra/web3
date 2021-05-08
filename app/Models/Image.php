<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string src
 */
class Image extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['src'];
}
