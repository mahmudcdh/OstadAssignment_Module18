<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'title', 'details', 'category_id'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function getTotalPostsCount($categoryId){
        return self::where('category_id', $categoryId)->count();
    }

    public static function getAllSoftDeletedPosts(){
        return self::withTrashed()->get();
    }
}
