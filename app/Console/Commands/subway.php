<?php

namespace App\Console\Commands;

use App\AdmArea;
use App\MetroStation;
use App\Region;
use Illuminate\Console\Command;

class subway extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subway:import';

    /**
     * The console command description.
     * https://op.mos.ru/EHDWSREST/catalog/export/get?id=484577
     *
     * @var string
     */
    protected $description = 'Import subways and Moscow regions from json';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public static function handle()
    {
        $path = storage_path() . "/json/subway.json"; // ie: /var/www/laravel/app/storage/json/filename.json
        $json = json_decode(file_get_contents($path), true);
        foreach ($json as $sw) {
            // adm areas
            AdmArea::firstOrCreate([
                'name' => $sw['AdmArea'],
                'is_moscow' => 1
            ]);
        }
        foreach ($json as $sw) {
            // regions
            Region::firstOrCreate([
                'name' => $sw['District'],
                'adm_area_id' => AdmArea::where(['name' => $sw['AdmArea']])->first()->id
            ]);
        }
        foreach ($json as $sw) {
            MetroStation::firstOrCreate([
                'name' => $sw['Station'],
                'line' => $sw['Line'],
                'region_id' => Region::where(['name' => $sw['District']])->first()->id,
            ]);
        }
    }
}
