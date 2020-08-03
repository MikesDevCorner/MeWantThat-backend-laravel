<?php

use Illuminate\Database\Seeder;

class ListenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Listenposten::truncate();
        App\Einkaufsliste::truncate();

        App\Einkaufsliste::create([
            'listenname' => 'Spar'
        ]);

        App\Einkaufsliste::create([
            'listenname' => 'Drogeriemarkt'
        ]);

        App\Listenposten::create([
            'postenname' => 'Käse',
            'anzahl' => 4,
            'einkaufsliste_id' => 1
        ]);
        App\Listenposten::create([
            'postenname' => 'Wurst',
            'anzahl' => 2,
            'einkaufsliste_id' => 1
        ]);
        App\Listenposten::create([
            'postenname' => 'Duschgel',
            'anzahl' => 1,
            'einkaufsliste_id' => 2
        ]);
        App\Listenposten::create([
            'postenname' => 'Seife',
            'anzahl' => 3,
            'einkaufsliste_id' => 2
        ]);
        App\Listenposten::create([
            'postenname' => 'Müllsäcke',
            'anzahl' => 5,
            'einkaufsliste_id' => 2
        ]);
    }
}
