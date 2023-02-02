<?php

namespace App\Http\Controllers\API;

use SplFileInfo;
use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
            'parrent_id' => $request->parrent_id,
            'name' => $request->name,
            'email' => $request->email,
            'url' => $request->url,
            'comment' => strip_tags($request->comment, '<i><strong><code><a><p><pre><span>'),
            'file' => $path
        ]);
    }

    public function getComments($sort_type = 'date_desc') {
        $comments = [];

        switch ($sort_type) {
            case 'date_desc':
                $comments = Comment::where('parrent_id', null)->orderBy('created_at', 'desc')->paginate(25);
                break;
            case 'date_asc':
                $comments = Comment::where('parrent_id', null)->orderBy('created_at', 'asc')->paginate(25);
                break;
            case 'name_asc':
                $comments = Comment::where('parrent_id', null)->orderBy('name', 'asc')->paginate(25);
                break;
            case 'name_desc':
                $comments = Comment::where('parrent_id', null)->orderBy('name', 'desc')->paginate(25);
                break;
            case 'email_asc':
                $comments = Comment::where('parrent_id', null)->orderBy('email', 'asc')->paginate(25);
                break;
            case 'email_desc':
                $comments = Comment::where('parrent_id', null)->orderBy('email', 'desc')->paginate(25);
                break;
        }

        $paginates = [
            'is_view_paginate' => $comments->hasPages(),
            'curr_page' => $comments->currentPage(),
            'items' => $comments->links()->elements[0],
            'items_count' => count($comments->links()->elements[0]),
            'total' => $comments->total(),
            'is_first' => $comments->onFirstPage(),
            'is_last' => $comments->hasMorePages(),
        ];

        $tmp_arr = [];

        function pushArr($comments, &$tmp_arr)
        {
            foreach ($comments as $item) {
                $info_file = new SplFileInfo($item->file);

                $slug = Str::slug($item->name) . '-' . $item->created_at;

                $tmp_arr[$slug] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'email' => $item->email,
                    'url' => $item->url,
                    'comment' => $item->comment,
                    'file' => $item->file,
                    'file_name' => $item->file ? $info_file->getBasename() : null,
                    'file_format' => $item->file ? $info_file->getExtension() : null,
                    'date' => date('d.m.Y', strtotime($item->created_at)),
                    'time' => date('H:i', strtotime($item->created_at)),
                ];

                if ($item->childs->count()) {
                    pushArr($item->childs, $tmp_arr[$slug]['childs']);
                }
            }
        }

        pushArr($comments, $tmp_arr);

        return response()->json([
            'comments' => $tmp_arr,
            'paginates' => $paginates
        ]);
    }
}
