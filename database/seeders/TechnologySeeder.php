<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $techs = [
            'HTML',
            'SCSS',
            'CSS',
            'JavaScript',
            'Vuejs',
            'PHP',
            'Laravel',
        ];
        foreach($techs as $tech){
            $newTech = new Technology();
            $newTech->name = $tech;
            $newTech->slug = Str::slug($newTech->name, '-');
            $newTech->save();
        }
    }
}
