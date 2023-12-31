<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function allLatestPost(){

        return $this->posts()->latest('updated_at')->first();

    }

}
