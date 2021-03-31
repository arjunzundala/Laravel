<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BloggerController extends Controller
{
    //
    public function index() {
        $bloggers = Blogger::orderBy("id", "DESC")->get();
        return view('ViewBloggers', compact('bloggers'));
    }
}
