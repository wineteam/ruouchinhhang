<?php

namespace App\Providers;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use App\Models\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $blogsRecent = Blog::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('blogs.*')->where('is_published','1')->orderBy('view','desc')->take(4)->get();
      
      $tagPrimaryBLog = Tag::where('blog_id','!=',null)->where('primary','1')->limit('8')->get();
        View::share(['tagPrimaryBLog'=>$tagPrimaryBLog,'blogsRecent'=>$blogsRecent]);
        Paginator::useBootstrap();

        if(Schema::hasTable('language_switches')) {
          $languages = LanguageSwitch::get();
          view()->share('languages', $languages);
        }
    }
}
