<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* 
        ! @method 1 
        */
        // Post::factory(10)->create();

        /* 
        ! @method 2 
        */
        // Post::create([
        //     'title'        => 'title-2',
        //     'slug'         => 'post-2',
        //     'excerpt'      => 'excerpt-2',
        //     'description'  => 'description-2',
        //     'is_published' => true,
        //     'min_to_read'  => 25,
        // ]);

        /* 
        ! @method 3 
        */

        // $posts = collect([
        //     [
        //         'title'        => 'title-3',
        //         'slug'         => 'post-3',
        //         'excerpt'      => 'excerpt-3',
        //         'description'  => 'description-3',
        //         'is_published' => true,
        //         'min_to_read'  => 30,
        //     ],
        //     [
        //         'title'        => 'title-4',
        //         'slug'         => 'post-4',
        //         'excerpt'      => 'excerpt-4',
        //         'description'  => 'description-4',
        //         'is_published' => true,
        //         'min_to_read'  => 35,
        //     ],
        // ]);

        // $posts->each(function ($post) { // ? if you use create() method the timestamps will be automatically added while insert() method will not add timestamps.
        //     Post::create($post);
        // });

        // $posts->each(function ($post) {
        //     Post::create([
        //         'title'        => $post['title'],
        //         'slug'         => $post['slug'],
        //         'excerpt'      => $post['excerpt'],
        //         'description'  => $post['description'],
        //         'is_published' => $post['is_published'],
        //         'min_to_read'  => $post['min_to_read'],
        //     ]);
        // });

        /* 
        ! @method 4 | Using JSON file
        */

        $json = File::get('database/json/posts.json');
        $posts = collect(json_decode($json));

        $posts->each(function ($post) {
            Post::create([
                'title'        => $post->title,
                'slug'         => $post->slug,
                'excerpt'      => $post->excerpt,
                'description'  => $post->description,
                'is_published' => $post->is_published,
                'min_to_read'  => $post->min_to_read,
            ]);
        });
    }
}