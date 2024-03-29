<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateMatkonetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matkonet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matalaTitle',255);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE matkonet ENGINE=InnoDB AUTO_INCREMENT=621 DEFAULT CHARSET=latin1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matkonet');
    }
}
