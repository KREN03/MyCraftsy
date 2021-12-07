<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'user_id' => 1,
                'forum_id' => 1,
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, perspiciatis fuga odit voluptate dicta magni quis voluptatibus a impedit adipisci dolores, esse quasi reprehenderit aperiam laudantium illum soluta accusamus necessitatibus delectus numquam. Deserunt, dicta repudiandae doloremque, eius hic odio quidem mollitia minima at culpa sit assumenda et! Voluptatem unde voluptate repellendus laboriosam placeat animi quam minima! Ad architecto modi eveniet!'
            ],
            [
                'user_id' => 1,
                'forum_id' => 1,
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, perspiciatis fuga odit voluptate dicta magni quis voluptatibus a impedit adipisci dolores, esse quasi reprehenderit aperiam laudantium illum soluta accusamus necessitatibus delectus numquam. Deserunt, dicta repudiandae doloremque, eius hic odio quidem mollitia minima at culpa sit assumenda et! Voluptatem unde voluptate repellendus laboriosam placeat animi quam minima! Ad architecto modi eveniet!'
            ],
            [
                'user_id' => 1,
                'forum_id' => 2,
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, perspiciatis fuga odit voluptate dicta magni quis voluptatibus a impedit adipisci dolores, esse quasi reprehenderit aperiam laudantium illum soluta accusamus necessitatibus delectus numquam. Deserunt, dicta repudiandae doloremque, eius hic odio quidem mollitia minima at culpa sit assumenda et! Voluptatem unde voluptate repellendus laboriosam placeat animi quam minima! Ad architecto modi eveniet!'
            ],
            [
                'user_id' => 1,
                'forum_id' => 2,
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, perspiciatis fuga odit voluptate dicta magni quis voluptatibus a impedit adipisci dolores, esse quasi reprehenderit aperiam laudantium illum soluta accusamus necessitatibus delectus numquam. Deserunt, dicta repudiandae doloremque, eius hic odio quidem mollitia minima at culpa sit assumenda et! Voluptatem unde voluptate repellendus laboriosam placeat animi quam minima! Ad architecto modi eveniet!'
            ],
            [
                'user_id' => 1,
                'forum_id' => 3,
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, perspiciatis fuga odit voluptate dicta magni quis voluptatibus a impedit adipisci dolores, esse quasi reprehenderit aperiam laudantium illum soluta accusamus necessitatibus delectus numquam. Deserunt, dicta repudiandae doloremque, eius hic odio quidem mollitia minima at culpa sit assumenda et! Voluptatem unde voluptate repellendus laboriosam placeat animi quam minima! Ad architecto modi eveniet!'
            ],
            [
                'user_id' => 1,
                'forum_id' => 3,
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, perspiciatis fuga odit voluptate dicta magni quis voluptatibus a impedit adipisci dolores, esse quasi reprehenderit aperiam laudantium illum soluta accusamus necessitatibus delectus numquam. Deserunt, dicta repudiandae doloremque, eius hic odio quidem mollitia minima at culpa sit assumenda et! Voluptatem unde voluptate repellendus laboriosam placeat animi quam minima! Ad architecto modi eveniet!'
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
