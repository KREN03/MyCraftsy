<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forums = [
            [
                'name' => 'Gemar Lukis',
                'description' => 'Berdiskusi dengan orang-orang yang gemar melukis',
                'user_id' => 1,
                'thumbnail' => 'https://images.unsplash.com/photo-1537884557178-342a575d7d16?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80'
            ],
            [
                'name' => 'Suka Coding',
                'description' => 'Berdiskusi dengan orang-orang yang suka coding',
                'user_id' => 1,
                'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=872&q=80'
            ],
            [
                'name' => 'Puisi anak Indo',
                'description' => 'Sharing dengan teman-teman yang suka puisi',
                'user_id' => 1,
                'thumbnail' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=898&q=80'
            ],
            [
                'name' => 'Mari Berpantun',
                'description' => 'Berdiskusi dengan orang-orang yang gemar pantun',
                'user_id' => 1,
                'thumbnail' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=990&q=80'
            ],
        ];

        foreach ($forums as $forum) {
            Forum::create($forum);
        }
    }
}
