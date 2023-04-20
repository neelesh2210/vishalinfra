<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\LevelPercent;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for($i=0;$i<=12;$i++){
            if($i == 0){
                $percent = 2.5;
            }else{
                $percent = 4+$i;
            }
            LevelPercent::create([
                'level'=>$i,
                'percent'=>$percent
            ]);
        }
    }
}
