<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models
 * @property int id
 * @property string name
 * @property Collection books
 */
class Category extends Model
{
    use HasFactory, ApiResource;

    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
