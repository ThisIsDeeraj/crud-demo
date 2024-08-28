<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function create() {
        return view('admin.blog.create');
     }

     public function store(Request $request) {
           $blog =  Blog::create(
                [
                    'title' => $request->title,
                    'content' => $request->content
                ]
            );

            echo "stored";
     }


     public function  index() {

        $blogs = Blog::get();
        return view('admin.blog.index',compact('blogs'));
     }

     public function edit($id) {
        $blog = Blog::where('id','=',$id)->first();

        return view('admin.blog.edit',compact('blog'));
     }
     public function update($id, Request $request) {
        $blog = Blog::where('id','=',$id)->update(
            [
                'title' => $request->title,
                'content' => $request->content
            ]
        );
        return redirect()->route('blog.index');
     }

     public function delete($id) {
        $blog = Blog::where('id', $id)->first();
        $blog->delete();
        return redirect()->route('blog.index');


     }
}