<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "surface",
        "rooms",
        "bedrooms",
        "floor",
        "price",
        "city",
        "postal_code",
        "sold",
    ];

    public function Options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }

    public function scopeAvailable(Builder $builder)
    {
        return $builder->where('sold', false);
    }
}
