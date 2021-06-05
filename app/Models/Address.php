<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Address
 * @package App\Models
 * @property string id
 * @property string postcode
 * @property string phone
 * @property string city
 * @property string street
 * @property string country_id
 * @property Country country
 * @property string house
 * @property string note
 * @property string name
 * @property string email
 */
class Address extends Model
{
    use HasFactory, ApiResource, UUID;

    protected $fillable = ['postcode', 'phone', 'city', 'street', 'house', 'note', 'name', 'email', 'country_id'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function equals(array $validated): bool
    {
        foreach ($this->fillable as $item) {
            if($this->$item != $validated[$item]){
                return false;
            }
        }
        return true;
    }
}
