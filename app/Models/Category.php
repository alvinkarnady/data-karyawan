<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory;
    use Sluggable;

    public $table = "data_categories";

    protected $guarded = [''];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }



    // ganti nama default slug
    public function getRouteKeyName(): string
    {
        return 'slug_categories';
    }

    public function sluggable(): array
    {
        return [
            'slug_categories' => ['source' => 'name_categories']
        ];
    }
}
