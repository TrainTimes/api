<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WCRoutesTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Western Cape
        \DB::table('routes')->insert([
            ['province_id' => 9, 'route' => 'CAPE FLATS LINE', 'description' => ''],
            ['province_id' => 9, 'route' => 'CAPE TOWN VIA MONTE VISTA', 'description' => 'ENDS AT BELLVILLE'],
            ['province_id' => 9, 'route' => 'CENTRAL LINE', 'description' => 'KHAYELITSHA LINE'],
            ['province_id' => 9, 'route' => 'NORTHERN LINE', 'description' => 'UP TO WELLINGTON AND STRAND'],
            ['province_id' => 9, 'route' => 'SOUTHERN LINE', 'description' => ''],
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
