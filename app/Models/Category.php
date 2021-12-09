<?php

namespace App\Models;
// use APP\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'parent_id'
    ];

  

   
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Each category may have multiple children
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
