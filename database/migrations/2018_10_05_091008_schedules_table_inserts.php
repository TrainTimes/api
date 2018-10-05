<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchedulesTableInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cape Town
        \DB::table('schedules')->insert([
            ['province_id' => 9, 'route_id' => 5, 'train_id' => '0197', 'period_id' => 1,'direction' => 'CT-ST', 'interval' => '04:00',
                'schedule' => '{}'],
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
