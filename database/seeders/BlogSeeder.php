<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo 20 bài blog ngẫu nhiên
        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence(6);            
            DB::table('blogs')->insert([
                'title' => $title,
                'image' => $faker->randomElement([
                    'blog1.jpg', 
                    'blog2.jpg', 
                    'blog3.jpg', 
                    'blog4.jpg', 
                    null // 20% cơ hội không có ảnh
                ]),
                'content' => $this->generateBlogContent($faker),
                'alias' => Str::slug($title),
                'status' => $faker->randomElement(['active', 'inactive']),
                'description' => $faker->paragraph(3),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
    protected function generateBlogContent($faker)
    {
        $content = '<h2>' . $faker->sentence(5) . '</h2>';
        $content .= '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>';
        
        $content .= '<h3>' . $faker->sentence(4) . '</h3>';
        $content .= '<p>' . implode('</p><p>', $faker->paragraphs(3)) . '</p>';        
        if (rand(0, 1)) {
            $content .= '<ul><li>' . implode('</li><li>', $faker->sentences(4)) . '</li></ul>';
        }
        
        $content .= '<p>' . implode('</p><p>', $faker->paragraphs(2)) . '</p>';
        
        return $content;
    }
}
