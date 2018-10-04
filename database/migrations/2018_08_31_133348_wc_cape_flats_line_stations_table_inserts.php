<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WCCapeFlatsLineStationsTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Western Cape - Cape Flats
        \DB::table('stations')->insert([
            ['route_id' => 1, 'station' => 'CAPE TOWN'],
            ['route_id' => 1, 'station' => 'WOODSTOCK'],
            ['route_id' => 1, 'station' => 'SALT RIVER'],
            ['route_id' => 1, 'station' => 'KOEBERG ROAD'],
            ['route_id' => 1, 'station' => 'MAITLAND'],
            ['route_id' => 1, 'station' => 'NDABENI'],
            ['route_id' => 1, 'station' => 'PINELANDS'],
            ['route_id' => 1, 'station' => 'HAZENDAL'],
            ['route_id' => 1, 'station' => 'ATHLONE'],
            ['route_id' => 1, 'station' => 'CRAWFORD'],
            ['route_id' => 1, 'station' => 'LANSDOWNE'],
            ['route_id' => 1, 'station' => 'WETTON'],
            ['route_id' => 1, 'station' => 'OTTERY'],
            ['route_id' => 1, 'station' => 'SOUTHFIELD'],
            ['route_id' => 1, 'station' => 'HEATHFIELD'],
            ['route_id' => 1, 'station' => 'RETREAT'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
