<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(20)->create();
         DB::Table('language_switches')->insert([
             [
                 'name'=>'Việt Nam',
                 'slug'=>'VN',
                 'created_at'=>now(),
                 'updated_at'=>now()
             ],
             [
                 'name'=>'English',
                 'slug'=>'EN',
                 'created_at'=>now(),
                 'updated_at'=>now()
             ],
         ]);
       DB::table('categories')->insert([
            [
              'user_id'=>1,
              'name'=>'red wines',
              'slug'=>'red_wines',
              'type'=>'0',
              'is_published'=>'1',
              'language_id'=>'1',
              'order'=>null,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            [
              'user_id'=>1,
              'name'=>'rose wines',
              'slug'=>'rose_wines',
              'type'=>'0',
              'is_published'=>'1',
              'language_id'=>'1',
              'order'=>null,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            [
              'user_id'=>1,
              'name'=>'Sparkling',
              'slug'=>'sparkling',
              'type'=>'0',
              'is_published'=>'1',
              'language_id'=>'1',
              'order'=>null,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            [
              'user_id'=>1,
              'name'=>'White wines',
              'slug'=>'white_wines',
              'type'=>'0',
              'is_published'=>'1',
              'language_id'=>'1',
              'order'=>null,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            [
                'user_id'=>1,
              'name'=>'Food pairings',
              'slug'=>'food_pairings',
              'type'=>'1',
              'is_published'=>'1',
              'language_id'=>'1',
              'order'=>null,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
           [
               'user_id'=>1,
               'name'=>'Producers',
               'slug'=>'producers',
               'type'=>'1',
               'is_published'=>'1',
               'language_id'=>'1',
               'order'=>null,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now()
           ],
           [
               'user_id'=>1,
               'name'=>'Wine regions',
               'slug'=>'wine_regions',
               'type'=>'1',
               'is_published'=>'1',
               'language_id'=>'1',
               'order'=>null,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now()
           ],
           [
               'user_id'=>1,
               'name'=>'Our news',
               'slug'=>'our_news',
               'type'=>'1',
               'is_published'=>'1',
               'language_id'=>'1',
               'order'=>null,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now()
           ],

        ]);
        \App\Models\Product::factory(100)->create();
        \App\Models\Blog::factory(100)->create();
        \App\Models\CategoryBlog::factory(150)->create();
        \App\Models\CategoryProduct::factory(150)->create();
    }
}
