<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // Schools
        $schools = [
            ['name' => 'Beauxbatons Academy of Magic'],
            ['name' => 'Castelobruxo'],
            ['name' => 'Durmstrang Institute'],
            ['name' => 'Hogwarts School of Witchcraft and Wizardry'],
            ['name' => 'Ilvermorny School of Witchcraft and Wizardry',],
            ['name' => 'Koldovstoretz'],
            ['name' => 'Mahoutokoro School of Magic',],
            ['name' => 'Uagadou School of Magic'],
        ];
        foreach($schools as $school){
            \App\School::create($school);
        }

        // Houses
        $houses = [
            ['potterapi_id' => '5a05e2b252f721a3cf2ea33f', 'name' => 'Gryffindor', 'school_id' => DB::table('schools')->where('name', 'Hogwarts School of Witchcraft and Wizardry')->value('id')],
            ['potterapi_id' => '5a05da69d45bd0a11bd5e06f', 'name' => 'Ravenclaw', 'school_id' => DB::table('schools')->where('name', 'Hogwarts School of Witchcraft and Wizardry')->value('id')],
            ['potterapi_id' => '5a05dc8cd45bd0a11bd5e071', 'name' => 'Slytherin', 'school_id' => DB::table('schools')->where('name', 'Hogwarts School of Witchcraft and Wizardry')->value('id')],
            ['potterapi_id' => '5a05dc58d45bd0a11bd5e070', 'name' => 'Hufflepuff', 'school_id' => DB::table('schools')->where('name', 'Hogwarts School of Witchcraft and Wizardry')->value('id')],
        ];
        foreach($houses as $house){
            \App\House::create($house);
        }

        // Roles
        $roles = [
            ['name' => 'Teacher'],
            ['name' => 'Student'],
        ];
        foreach($roles as $role){
            \App\Role::create($role);
        }

    }
}
