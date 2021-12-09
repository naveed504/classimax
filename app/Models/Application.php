<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['b_name', 'email','b_address', 'user_id','u_name', 'social_links', 'select', 'has_document', 'message', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
