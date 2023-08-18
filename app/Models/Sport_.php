<?php

namespace App\Models;


class Sport
{
    private static $posts_sports = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "author" => "Andriano",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi incidunt repudiandae, delectus, dolore voluptas vitae magnam maiores commodi, cum libero exercitationem perspiciatis tempore quibusdam impedit corporis nesciunt voluptatum amet earum!"
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Maman",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi incidunt repudiandae, delectus, dolore voluptas vitae magnam maiores commodi, cum libero exercitationem perspiciatis tempore quibusdam impedit corporis nesciunt voluptatum amet earum!"
        ]
    ];
    public static function all() 
    {
        return collect(self::$posts_sports);
    }
    public static function find($slug)
    {
        $sports = static::all();
        return $sports->firstWhere('slug', $slug);
    }
}
