<?php

namespace App\Models;



class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Alvin Karnady",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, adipisci. Nam nulla, ratione ab optio sed aspernatur magnam suscipit officiis reprehenderit, soluta eligendi nihil molestiae voluptatibus et quae deserunt sunt. In, eum aperiam autem commodi nam odit cupiditate quo a reiciendis minus architecto possimus natus placeat, cumque magni error, ipsam accusantium magnam dolor nisi. Atque, voluptas reprehenderit ullam officia nihil vitae, eveniet nam, maxime harum veniam laborum tenetur rem minus cupiditate explicabo? Explicabo beatae impedit non ea repudiandae accusantium maxime."
    
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Jysa nursakinah",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit odio vel tempora, culpa at blanditiis ex neque doloremque quibusdam exercitationem corrupti temporibus officiis dolorem deserunt! Recusandae quibusdam quas cum veritatis adipisci deserunt incidunt. Vitae eos aspernatur libero placeat facilis pariatur corrupti odit harum autem. Laboriosam, quidem officiis. Similique rem quisquam quasi saepe reiciendis aliquid dolore voluptatem dolores omnis illum dolorem vel totam deleniti aut facere ipsam eveniet quas numquam mollitia possimus, hic accusamus. Nam eos quo id aliquam distinctio et quisquam est reiciendis cumque deserunt cupiditate omnis, maxime nulla odio incidunt, facilis eligendi eum voluptatem. Quaerat voluptates officia accusantium repellendus."
        
            ],
    
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

    

    
    
}
