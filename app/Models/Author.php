<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['name'];
}
