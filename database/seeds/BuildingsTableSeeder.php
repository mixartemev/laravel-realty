<?php

use App\Floor;
use App\RealtyObject;
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

        $buildings->each(function($u) {
            /** @var \App\Building $u */
            $u->floors()->save(factory(App\Floor::class)->create())->each(function($f) {
                /** @var \App\Floor $f */
                $f->realty_objects()->save(factory(App\RealtyObject::class)->create());
            });
        });
    }
}
