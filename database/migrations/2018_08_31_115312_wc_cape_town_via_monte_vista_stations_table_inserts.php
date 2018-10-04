<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WcCapeTownViaMonteVistaStationsTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Western Cape - Cape Town via Monte Vista
        \DB::table('stations')->insert([
            ['route_id' => 2, 'station' => 'CAPE TOWN'],
            ['route_id' => 2, 'station' => 'ESPLANADE'],
            ['route_id' => 2, 'station' => 'YSTERPLAAT VALUE'],
            ['route_id' => 2, 'station' => 'KENTEMADE'],
            ['route_id' => 2, 'station' => 'CENTURY CITY'],
            ['route_id' => 2, 'station' => 'AKASIA PARK'],
            ['route_id' => 2, 'station' => 'MONTE VISTA'],
            ['route_id' => 2, 'station' => 'DE GRENDEL'],
            ['route_id' => 2, 'station' => 'AVONDALE'],
            ['route_id' => 2, 'station' => 'OOSTERZEE'],
            ['route_id' => 2, 'station' => 'BELLVILLE'],
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
