<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'user_name' => 'required',
            'content' => 'required',
            'post_id' => 'integer',
        ];
        $messages = [
            'user_name.required' => 'Не заполнено имя в форме комментария',
            'content' => 'Не заполнен текст комментария',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        Comment::create($request->all());
        $request->session()->flash('success', 'Комментарий добавлен!');
        return back();
    }

}
