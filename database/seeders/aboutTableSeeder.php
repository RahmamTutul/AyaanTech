<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class aboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = [
            [
                'id'=>1,
                'title'=>'WHO WE ARE?',
                'details'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'image'=>'about.png',
                'url'=>'whoweare'

            ],
            
         ];
        About::insert($about);

    }
}
