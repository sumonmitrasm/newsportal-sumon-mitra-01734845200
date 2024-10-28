<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            ['id'=>1,'name'=>'Sumon Mitra','type'=>'superadmin','mobile'=>'01734845200','email'=>'sumonmitrasm@gmail.com','password'=>'$2a$12$y/k2ZsYP0k7wm1b/PvcRo.E.V7vkH2Jg/ZrrYlfuvaNS.2DZeubRa','image'=>'','description'=>'','status'=>1],
        ];
        Admin::insert($adminRecords);
    }
}
