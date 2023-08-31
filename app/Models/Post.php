<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use HasFactory;
    use Sluggable;

    public $table = "data_posts";

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];


    public function scopeFilter($query, array $filters)
    {

        // if(isset($filters['search']) ? $filters['search'] : false){
        //      return $query->where('title', 'like', '%'. $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%'. $filters['search'] . '%');
        // };

        $query->when($filters['search'] ??  false, function ($query, $search) {
            return $query->where('title_posts', 'like', '%' . $search . '%')
                ->orWhere('body_posts', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug_categories', $category);
            });
        });

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username_users', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    //ganti nama default slug
    public function getRouteKeyName(): string
    {
        return 'slug_posts';
    }


    public function sluggable(): array
    {
        return [
            'slug_posts' => [
                'source' => 'title_posts'
            ]
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_post');
    }
}
