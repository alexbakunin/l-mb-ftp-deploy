<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $count = [
            'posts' => DB::table('posts')->count(),
            'users' => DB::table('users')->count(),
        ];

        return view('admin.main.index', compact('count'));
    }

}
