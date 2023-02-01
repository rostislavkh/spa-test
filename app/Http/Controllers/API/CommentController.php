<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MakeControllerStore;

class CommentController extends Controller
{
    public function makeComment(MakeControllerStore $request) {

        $disk = Storage::disk('comment_images');
        $pref = '/comment_images/';
        $path = null;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $puth = $disk->put(null, $file, 'public');
            $path = $pref . $puth;
        }

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'url' => $request->url,
            'comment' => strip_tags($request->comment, '<i><strong><code><a><p>'),
            'file' => $path
        ]);
    }
}
