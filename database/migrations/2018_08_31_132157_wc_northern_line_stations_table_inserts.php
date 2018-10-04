<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WcNorthernLineStationsTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Western Cape - Northern Line
        \DB::table('stations')->insert([
            ['route_id' => 4, 'station' => 'CAPE TOWN'],
            ['route_id' => 4, 'station' => 'ESPLANADE'],
            ['route_id' => 4, 'station' => 'YSTERPLAAT'],
            ['route_id' => 4, 'station' => 'KENTEMADE'],
            ['route_id' => 4, 'station' => 'CENTURY CITY'],
            ['route_id' => 4, 'station' => 'AKASIA PARK'],
            ['route_id' => 4, 'station' => 'MONTE VISTA'],
            ['route_id' => 4, 'station' => 'DE GRENDEL'],
            ['route_id' => 4, 'station' => 'AVONDALE'],
            ['route_id' => 4, 'station' => 'OOSTERZEE'],
            ['route_id' => 4, 'station' => 'WOODSTOCK'],
            ['route_id' => 4, 'station' => 'SALT RIVER'],
            ['route_id' => 4, 'station' => 'KOEBERG RD'],
            ['route_id' => 4, 'station' => 'MAITLAND'],
            ['route_id' => 4, 'station' => 'WOLTEMADE'],
            ['route_id' => 4, 'station' => 'MUTUAL'],
            ['route_id' => 4, 'station' => 'THORNTON'],
            ['route_id' => 4, 'station' => 'GOODWOOD'],
            ['route_id' => 4, 'station' => 'VASCO'],
            ['route_id' => 4, 'station' => 'ELSIES RIVER'],
            ['route_id' => 4, 'station' => 'PAROW'],
            ['route_id' => 4, 'station' => 'TYGERBERG'],
            ['route_id' => 4, 'station' => 'BELLVILLE'],
            ['route_id' => 4, 'station' => 'KUILS RIVER'],
            ['route_id' => 4, 'station' => 'BLACKHEATH'],
            ['route_id' => 4, 'station' => 'MELTONROSE'],
            ['route_id' => 4, 'station' => 'EERSTE RIVER'],
            ['route_id' => 4, 'station' => 'FAURE'],
            ['route_id' => 4, 'station' => 'FIRGROVE'],
            ['route_id' => 4, 'station' => 'SOMERSET WEST'],
            ['route_id' => 4, 'station' => 'VAN DER STEL'],
            ['route_id' => 4, 'station' => 'STRAND'],
            ['route_id' => 4, 'station' => 'LYNEDOCH'],
            ['route_id' => 4, 'station' => 'VLOTTENBURG'],
            ['route_id' => 4, 'station' => 'STELLENBOSCH'],
            ['route_id' => 4, 'station' => 'DU TOIT'],
            ['route_id' => 4, 'station' => 'KOELENHOF'],
            ['route_id' => 4, 'station' => 'MULDERSVLEI'],
            ['route_id' => 4, 'station' => 'STIKLAND'],
            ['route_id' => 4, 'station' => 'BRACKENFELL'],
            ['route_id' => 4, 'station' => 'EIKENFONTEIN'],
            ['route_id' => 4, 'station' => 'KRAAIFONTEIN'],
            ['route_id' => 4, 'station' => 'KLAPMUTS'],
            ['route_id' => 4, 'station' => 'HUGUENOT'],
            ['route_id' => 4, 'station' => 'DAL JOSAFAT'],
            ['route_id' => 4, 'station' => 'MBEKWENI'],
            ['route_id' => 4, 'station' => 'WELLINGTON'],
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
