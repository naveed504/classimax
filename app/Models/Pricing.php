<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_duration', 'standard_listing', 'each_additional_image', 'each_additional_category', 'duration_days'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
