<?php

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = factory(App\Building::class, 50)->create();
        $floors = $buildings->each(function($u) {
            /** @var \App\Building $u */
            $u->floors()->save(factory(App\Floor::class)->create());
        });
    }
}
