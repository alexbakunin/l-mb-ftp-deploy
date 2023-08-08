<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('ru');
    }
    public function index()
    {
        $posts = Post::query()->orderBy('updated_at', 'desc')->paginate(env('FRONT_PAGINATION'));
        return view('posts.index', compact('posts'));
    }


    public function show($slug)
    {
        $post = Post::with('comments')->where('slug', $slug)->firstOrFail();
        $post->timestamps = false;
        $post->views += 1;
        $post->update();
        return view('posts.show', compact('post'));
    }

}
