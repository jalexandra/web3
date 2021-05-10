<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Book
 * @package App\Models
 * @property int id
 * @property string title
 * @property string description
 * @property int author_id
 * @property Author author
 * @property int image_id
 * @property Image image
 * @property int stock
 * @property int price
 * @property int category_id
 * @property Category category
 */
class Book extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['title', 'description', 'author_id', 'image_id', 'stock', 'price'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
