<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::join('language_switches', function ($join) {
            $join->on('language_id', '=', 'language_switches.id')
                ->where('language_switches.slug', '=', App()->getLocale());
        })->select('blogs.*')->where('is_published','1')->orderBy('created_at','desc')->get();
      session()->forget('message');
        return view('client.blog')->with(['blogs'=>$blogs]);
    }

    public function show(Blog $blog){
        $blogPOST = Blog::join('language_switches', function ($join) {$join->on('language_id', '=', 'language_switches.id')->where('language_switches.slug', '=', App()->getLocale());}
        )->select('blogs.*')->where('is_published','1')->where('especially','1')->inRandomOrder()->take(4)->orderBy('view','desc')->get();
      return view('client.blogdetails')->with(['blogs'=>$blogPOST,'blog'=>$blog]);;

    }
    public  function search(Request $request)
    {
       $blogs = Blog::join('language_switches', function ($join) {
         $join->on('blogs.language_id', '=', 'language_switches.id')
           ->where('language_switches.slug', '=', App()->getLocale());
       })->join('tags','blogs.id','=','tags.blog_id')->where('blogs.title','like','%'.$request->searching.'%')
         ->orWhere('tags.name','like','%'.$request->searching.'%')->where('blogs.is_published','1')->get();
       session()->flash('message',$request->searching);
      return view('client.blog')->with(['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
