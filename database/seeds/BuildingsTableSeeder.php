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

        factory(Floor::class, 20)->create();
//        $buildings = factory(Building::class, 10)->create();
//
//        $buildings->each(function($b) {
//
//            $objects = factory(RealtyObject::class, 5)->create();
//
//            /** @var Building $b */
//            $objects->each(function($o) use ($b){
//                $b->realty_objects()->save($o);
//                /** @var RealtyObject $o */
//                $o->floors()->save(factory(Floor::class)->create());
//            });
//        });
    }
}
