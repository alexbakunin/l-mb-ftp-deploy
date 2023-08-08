<?php

namespace App\View\Composers;

use App\Models\Post;
use Illuminate\View\View;

class SidebarComposer
{
    protected $posts;

    public function __construct(){
        $posts = Post::query()->orderBy('views', 'desc')->orderBy('updated_at', 'desc')->limit(env('POST_LIMIT_SIDEBAR'))->get();
        $this->posts = $posts;
    }

    public function compose(View $view){
        $view->with('posts', $this->posts);
    }

}
