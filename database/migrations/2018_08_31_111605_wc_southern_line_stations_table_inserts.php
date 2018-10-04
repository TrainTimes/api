n<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WcSouthernLineStationsTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Western Cape - Southern Line
        \DB::table('stations')->insert([
            ['route_id' => 5, 'station' => 'CAPE TOWN'],
            ['route_id' => 5, 'station' => 'WOODSTOCK'],
            ['route_id' => 5, 'station' => 'SALT RIVER'],
            ['route_id' => 5, 'station' => 'OBSERVATORY'],
            ['route_id' => 5, 'station' => 'MOWBRAY'],
            ['route_id' => 5, 'station' => 'ROSEBANK'],
            ['route_id' => 5, 'station' => 'RONDEBOSCH'],
            ['route_id' => 5, 'station' => 'NEWLANDS'],
            ['route_id' => 5, 'station' => 'CLAREMONT'],
            ['route_id' => 5, 'station' => 'HARFIELD RD'],
            ['route_id' => 5, 'station' => 'KENILWORTH'],
            ['route_id' => 5, 'station' => 'WYNBERG'],
            ['route_id' => 5, 'station' => 'WITTEBOME'],
            ['route_id' => 5, 'station' => 'PLUMSTEAD'],
            ['route_id' => 5, 'station' => 'STEURHOF'],
            ['route_id' => 5, 'station' => 'DIEPRIVIER'],
            ['route_id' => 5, 'station' => 'HEATHFIELD'],
            ['route_id' => 5, 'station' => 'RETREAT'],
            ['route_id' => 5, 'station' => 'STEENBERG'],
            ['route_id' => 5, 'station' => 'LAKESIDE'],
            ['route_id' => 5, 'station' => 'FALSE BAY'],
            ['route_id' => 5, 'station' => 'MUIZENBERG'],
            ['route_id' => 5, 'station' => 'ST JAMES'],
            ['route_id' => 5, 'station' => 'KALK BAY'],
            ['route_id' => 5, 'station' => 'FISH HOEK'],
            ['route_id' => 5, 'station' => 'SUNNY COVE'],
            ['route_id' => 5, 'station' => 'GLENCAIRN'],
            ['route_id' => 5, 'station' => 'SIMONS TOWN'],
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
