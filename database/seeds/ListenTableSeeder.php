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
        App\ShoppingListEntry::truncate();
        App\ShoppingList::truncate();

        App\ShoppingList::create([
            'listenname' => 'Spar'
        ]);

        App\ShoppingList::create([
            'listenname' => 'Drogeriemarkt'
        ]);

        App\ShoppingListEntry::create([
            'postenname' => 'Käse',
            'anzahl' => 4,
            'einkaufsliste_id' => 1
        ]);
        App\ShoppingListEntry::create([
            'postenname' => 'Wurst',
            'anzahl' => 2,
            'einkaufsliste_id' => 1
        ]);
        App\ShoppingListEntry::create([
            'postenname' => 'Duschgel',
            'anzahl' => 1,
            'einkaufsliste_id' => 2
        ]);
        App\ShoppingListEntry::create([
            'postenname' => 'Seife',
            'anzahl' => 3,
            'einkaufsliste_id' => 2
        ]);
        App\ShoppingListEntry::create([
            'postenname' => 'Müllsäcke',
            'anzahl' => 5,
            'einkaufsliste_id' => 2
        ]);
    }
}
