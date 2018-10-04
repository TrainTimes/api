<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WcCentralLineStationsTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Western Cape - Central Line
        \DB::table('stations')->insert([
            ['route_id' => 3, 'station' => 'CAPE TOWN'],
            ['route_id' => 3, 'station' => 'WOODSTOCK'],
            ['route_id' => 3, 'station' => 'SALT RIVER'],
            ['route_id' => 3, 'station' => 'KOEBERG RD'],
            ['route_id' => 3, 'station' => 'MAITLAND'],
            ['route_id' => 3, 'station' => 'NDABENI'],
            ['route_id' => 3, 'station' => 'PINELANDS'],
            ['route_id' => 3, 'station' => 'ESPLANADE'],
            ['route_id' => 3, 'station' => 'YSTERPLAAT'],
            ['route_id' => 3, 'station' => 'MUTUAL'],
            ['route_id' => 3, 'station' => 'LANGA'],
            ['route_id' => 3, 'station' => 'BONTEHEUWEL'],
            ['route_id' => 3, 'station' => 'NETREG'],
            ['route_id' => 3, 'station' => 'HEIDEVELD'],
            ['route_id' => 3, 'station' => 'NYANGA'],
            ['route_id' => 3, 'station' => 'PHILIPPI'],
            ['route_id' => 3, 'station' => 'LENTEGEUR'],
            ['route_id' => 3, 'station' => 'MITCHELLS PLAIN'],
            ['route_id' => 3, 'station' => 'KAPTEINSKLIP'],
            ['route_id' => 3, 'station' => 'STOCK ROAD'],
            ['route_id' => 3, 'station' => 'MANDALAY'],
            ['route_id' => 3, 'station' => 'NOLUNGILE'],
            ['route_id' => 3, 'station' => 'NONKQUBELA'],
            ['route_id' => 3, 'station' => 'KHAYELITSHA'],
            ['route_id' => 3, 'station' => 'KUYASA'],
            ['route_id' => 3, 'station' => 'CHRIS HANI'],
            ['route_id' => 3, 'station' => 'LAVISTOWN'],
            ['route_id' => 3, 'station' => 'BELHAR'],
            ['route_id' => 3, 'station' => 'UNIBELL'],
            ['route_id' => 3, 'station' => 'PENTECH'],
            ['route_id' => 3, 'station' => 'SAREPTA'],
            ['route_id' => 3, 'station' => 'BELLVILLE'],
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
