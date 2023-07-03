<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'description', 'category_id'];

    protected $dates = ['deleted_at'];
        public function category(){
            return $this->belongsTo(Category::class);
        }

        public static function totalPostsCountByCategory($categoryId){
            return self::where('category_id', $categoryId)->count();
        }

        public static function softDeletedData(){
            return self::onlyTrashed()->get();
        }

}
