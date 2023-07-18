<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
