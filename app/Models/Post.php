<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            'title' => 'first title',
            'slug' => 'first-title',
            'author' => 'Abdul Mannan',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure itaque optio minus error laborum quidem culpa animi accusamus nemo consequuntur atque veniam fugit, vero rem. Commodi odit odio exercitationem totam!lor
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam numquam quis esse. Mollitia illum, sit ullam aspernatur eum sint vel maiores voluptate quasi dolore assumenda quod obcaecati sed eius quo?'
        ],
        [
            'title' => 'second title',
            'slug' => 'second-title',
            'author' => 'Abdul Mannan',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure itaque optio minus error laborum quidem culpa animi accusamus nemo consequuntur atque veniam fugit, vero rem. Commodi odit odio exercitationem totam!lor
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam numquam quis esse. Mollitia illum, sit ullam aspernatur eum sint vel maiores voluptate quasi dolore assumenda quod obcaecati sed eius quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure itaque optio minus error laborum quidem culpa animi accusamus nemo consequuntur atque veniam fugit, vero rem. Commodi odit odio exercitationem totam!lor
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam numquam quis esse. Mollitia illum, sit ullam aspernatur eum sint vel maiores voluptate quasi dolore assumenda quod obcaecati sed eius quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure itaque optio minus error laborum quidem culpa animi accusamus nemo consequuntur atque veniam fugit, vero rem. Commodi odit odio exercitationem totam!lor
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam numquam quis esse. Mollitia illum, sit ullam aspernatur eum sint vel maiores voluptate quasi dolore assumenda quod obcaecati sed eius quo?'
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
