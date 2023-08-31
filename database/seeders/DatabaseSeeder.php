<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name_users' => 'Alvin Karnady',
            'username_users' => 'alvin_karnady',
            'email_users' => 'alvin.karnady@gmail.com',
            'phone_number_users' => '0895801552360',
            'password_users' => bcrypt('admin123')
        ]);
        // User::create([
        //     'name' => 'Jysa Nursakinah',
        //     'email' => 'jysa@gmail.com',
        //     'password' => bcrypt('123456')

        // ]);

        User::factory(3)->create();

        $users = User::all();
        Category::create([
            'name_categories' => 'Web Programing',
            'slug_categories' => 'web-programing',
            'id_users' => $users->random()->id

        ]);

        Category::create([
            'name_categories' => 'Web Design',
            'slug_categories' => 'web-design',
            'id_users' => $users->random()->id
        ]);

        Category::create([
            'name_categories' => 'Personal',
            'slug_categories' => 'personal',
            'id_users' => $users->random()->id
        ]);

        Category::create([
            'name_categories' => 'Web Development',
            'slug_categories' => 'web-development',
            'id_users' => $users->random()->id
        ]);


        Post::factory(10)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, odit?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse repellat, nostrum odio nesciunt minus labore unde impedit nobis accusamus ratione, dolorum alias nemo hic consequatur. Dolorum fugiat est quibusdam, dolor sit ipsa. Sapiente corrupti aliquid et labore iste eveniet ad nulla. Aliquid nobis quasi, aut voluptatibus velit, non explicabo reiciendis delectus corporis maiores quis itaque beatae. Sint similique repellat beatae officia at odit mollitia! Veritatis harum expedita fuga quia molestiae! Doloremque tempore temporibus debitis, quae officiis eveniet illo ea culpa necessitatibus totam molestias blanditiis obcaecati assumenda repellat. Quod eos suscipit ad ab eligendi, minus optio ex, doloribus modi labore, autem rem. Nisi ipsa quod, nemo voluptas consequuntur nesciunt vero possimus? Non eveniet provident magnam consequatur necessitatibus quam minima voluptates, temporibus minus laboriosam tempora? Tempora totam tenetur ipsum expedita porro at alias corrupti nisi iste tempore odio, minima pariatur rerum officiis similique eum itaque quis eveniet placeat, architecto quo. Id, voluptates?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, odit?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse repellat, nostrum odio nesciunt minus labore unde impedit nobis accusamus ratione, dolorum alias nemo hic consequatur. Dolorum fugiat est quibusdam, dolor sit ipsa. Sapiente corrupti aliquid et labore iste eveniet ad nulla. Aliquid nobis quasi, aut voluptatibus velit, non explicabo reiciendis delectus corporis maiores quis itaque beatae. Sint similique repellat beatae officia at odit mollitia! Veritatis harum expedita fuga quia molestiae! Doloremque tempore temporibus debitis, quae officiis eveniet illo ea culpa necessitatibus totam molestias blanditiis obcaecati assumenda repellat. Quod eos suscipit ad ab eligendi, minus optio ex, doloribus modi labore, autem rem. Nisi ipsa quod, nemo voluptas consequuntur nesciunt vero possimus? Non eveniet provident magnam consequatur necessitatibus quam minima voluptates, temporibus minus laboriosam tempora? Tempora totam tenetur ipsum expedita porro at alias corrupti nisi iste tempore odio, minima pariatur rerum officiis similique eum itaque quis eveniet placeat, architecto quo. Id, voluptates?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, odit?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse repellat, nostrum odio nesciunt minus labore unde impedit nobis accusamus ratione, dolorum alias nemo hic consequatur. Dolorum fugiat est quibusdam, dolor sit ipsa. Sapiente corrupti aliquid et labore iste eveniet ad nulla. Aliquid nobis quasi, aut voluptatibus velit, non explicabo reiciendis delectus corporis maiores quis itaque beatae. Sint similique repellat beatae officia at odit mollitia! Veritatis harum expedita fuga quia molestiae! Doloremque tempore temporibus debitis, quae officiis eveniet illo ea culpa necessitatibus totam molestias blanditiis obcaecati assumenda repellat. Quod eos suscipit ad ab eligendi, minus optio ex, doloribus modi labore, autem rem. Nisi ipsa quod, nemo voluptas consequuntur nesciunt vero possimus? Non eveniet provident magnam consequatur necessitatibus quam minima voluptates, temporibus minus laboriosam tempora? Tempora totam tenetur ipsum expedita porro at alias corrupti nisi iste tempore odio, minima pariatur rerum officiis similique eum itaque quis eveniet placeat, architecto quo. Id, voluptates?',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, odit?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse repellat, nostrum odio nesciunt minus labore unde impedit nobis accusamus ratione, dolorum alias nemo hic consequatur. Dolorum fugiat est quibusdam, dolor sit ipsa. Sapiente corrupti aliquid et labore iste eveniet ad nulla. Aliquid nobis quasi, aut voluptatibus velit, non explicabo reiciendis delectus corporis maiores quis itaque beatae. Sint similique repellat beatae officia at odit mollitia! Veritatis harum expedita fuga quia molestiae! Doloremque tempore temporibus debitis, quae officiis eveniet illo ea culpa necessitatibus totam molestias blanditiis obcaecati assumenda repellat. Quod eos suscipit ad ab eligendi, minus optio ex, doloribus modi labore, autem rem. Nisi ipsa quod, nemo voluptas consequuntur nesciunt vero possimus? Non eveniet provident magnam consequatur necessitatibus quam minima voluptates, temporibus minus laboriosam tempora? Tempora totam tenetur ipsum expedita porro at alias corrupti nisi iste tempore odio, minima pariatur rerum officiis similique eum itaque quis eveniet placeat, architecto quo. Id, voluptates?',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
