<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvincesTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('provinces')->insert([
            ['province' => 'EASTERN CAPE'],
            ['province' => 'FREE STATE'],
            ['province' => 'GAUTENG'],
            ['province' => 'KWAZULU-NATAL'],
            ['province' => 'LIMPOPO'],
            ['province' => 'MPUMALANGA'],
            ['province' => 'NORTHERN CAPE'],
            ['province' => 'NORTH WEST'],
            ['province' => 'WESTERN CAPE'],
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
