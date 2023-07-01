<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::with('category')->get();
        return view('blog.index', compact('posts'));
    }

    public function categoryCount($categoryId){
        $count = Post::getTotalPostsCount($categoryId);
        return response()->json(['count'=>$count]);
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('msg','Post id {{$id}} deleted successfully..!');
    }

    public function softDeletedPosts(){
        $softDeletedPosts = Post::getAllSoftDeletedPosts();
    }
}
