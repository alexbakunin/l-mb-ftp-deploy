<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back()->with('success', 'Комментарий удалён');
    }
}
