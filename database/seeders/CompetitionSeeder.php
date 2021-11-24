<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competitions = [
            [
                'title' => 'Kompetisi Menggambar Nasional',
                'category_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, corporis?',
                'slug' => Str::slug('Kompetisi Menggambar Nasional'),
                'lokasi' => 'Bandung, Jawa Barat',
                'thumbnail' => 'https://images.unsplash.com/photo-1590225472433-e20c5d118c60?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8ZHJhd2luZ3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
                'link_website' => 'https://unsplash.com/s/photos/drawing',
                'buku_panduan' => 'https://unsplash.com/s/photos/drawing',
                'date_start' => '2021-08-20',
                'date_end' => '2021-10-20',
            ],
            [
                'title' => 'Competitive Programming',
                'category_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, corporis?',
                'slug' => Str::slug('Competitive Programming'),
                'lokasi' => 'Medan, Sumatera Utara',
                'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y29kaW5nfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
                'link_website' => 'https://unsplash.com/s/photos/computer',
                'buku_panduan' => 'https://unsplash.com/s/photos/computer',
                'date_start' => '2021-08-20',
                'date_end' => '2021-10-20',
            ],
            [
                'title' => 'Kompetisi Melukis Nasional',
                'category_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, corporis?',
                'slug' => Str::slug('Kompetisi Melukis Nasional'),
                'lokasi' => 'Depok, Jawa Barat',
                'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y29kaW5nfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
                'link_website' => 'https://unsplash.com/s/photos/computer',
                'buku_panduan' => 'https://unsplash.com/s/photos/computer',
                'date_start' => '2021-08-20',
                'date_end' => '2021-10-20',
            ],
        ];

        foreach ($competitions as $competition) {
            Competition::create($competition);
        }
    }
}
