<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasktableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskData=[
            ['id'=>1,'name'=>'Media maintinance','packege_id'=>4, 'details'=>'numquam maiores exercitationem dignissimos error dolore quod fugit nobis asperiores aperiam minus. Facilis.','image'=>'default.png'],
            ['id'=>2,'name'=>'Banner Creattion','packege_id'=>4, 'details'=>'numquam maiores exercitationem dignissimos error dolore quod fugit nobis asperiores aperiam minus. Facilis.','image'=>'default.png'],
        ];
        Task::insert($taskData);
    }
}
