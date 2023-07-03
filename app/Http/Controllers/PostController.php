<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost(){
            $data['posts'] = Post::with('category')->get();

            return view('pages.home',$data);
            // return response()->json(
            //     ['data' => $data]
            // );
    }

    public function categoryPostCount($category_id){
        $data['category'] = Category::find($category_id)->name;
        $data['total_number_of_posts'] = Post::categoryWisePostCount($category_id);

        return response()->json(
            [   
                'data' => $data
                
            ]);
    }

    public function delete($id){
        try {
        $softDelete = Post::findOrFail($id)->delete();
            return 'Successfully Soft deleted';
        } catch (\Exception $e) {
            return 'Failed to Softdelete. try Again';
        }
    }
    public function categoryWisePost($id){
        try {
            $category = Category::findOrFail($id);
            $data['name'] =  $category->name;
            $data['posts'] =  $category->posts;
            return response()->json([   
                    'data' => $data
                ]);
        } catch (\Exception $e) {
            return 'Category Not found.';
        }
    }
    public function categoryWiseLatestPost($id){
        try {
            $category = Category::findOrFail($id);
            $data['name'] =  $category->name;
            $data['posts'] =  $category->allLatestPost();
            return response()->json([   
                    'data' => $data
                ]);
            
        } catch (\Exception $e) {
            return 'Category Not found.';
        }
    }

    public function CategoriesLatestPosts()
    {
        $data['categories'] = Category::all();
        return view('pages.categories', $data);
    }

    public function allSoftDeletedRows(){
        $softData = Post::softDeletedRows();
        return $softData;
    }
}
