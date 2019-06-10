<?php

use App\Building;
use App\Console\Commands\subway;
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
        subway::handle();

        $buildings = factory(Building::class, 10)->create();

        $buildings->each(function($u) {
            $floors = factory(Floor::class, 3)->create();
            /** @var Building $u */
            $floors->each(function($f) use ($u){
                $u->floors()->save($f);
                /** @var Floor $f */
                $f->realty_objects()->save(factory(RealtyObject::class)->create());
            });
        });
    }
}
