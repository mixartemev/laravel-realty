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

        $buildings->each(function($b) {

            $objects = factory(RealtyObject::class, 5)->create();

            /** @var Building $b */
            $objects->each(function($o) use ($b){
                /** @var RealtyObject $o */
                $b->realty_objects()->save($o);
                $floors = factory(Floor::class, 2)->create(['realty_object_id' => $b->id]);

                $floors->each(function($f) use ($o) {
                    /** @var Floor $f */
                    $o->floors()->save($f);
                });
            });
        });
    }
}
