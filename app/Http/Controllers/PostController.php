<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postAll(){
            $data['posts'] = Post::with('category')->get();

            return $data;
    }

    public function categoryPost($category_id){
        $postCount = Post::totalPostsCountByCategory($category_id);

        return response()->json(
            ['Count' => $postCount]
        );
    }

    public function softDelete($id){
        $softDelete = Post::find($id)->delete();
        if ($softDelete) {
            return 'successfully soft deleted';
        } else {
            return 'failed to softdelete';
        }
    }
    public function specificCatPost($id){
        try {
            $category = Category::findOrFail($id);
            return $category->posts;
        } catch (\Exception $e) {
            return 'Category not found.';
        }
    }
    public function latestPost($id){
        $category = Category::findOrFail($id)->latestPost();
        return $category;
    }

    public function softData(){
        $softData = Post::softDeletedData();;
        return $softData;
    }
}
