<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkyCardPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sky_card_promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('sender_name');
            $table->text('greetings');
            $table->text('from_name');
            $table->text('status');
            $table->text('user_id');
            $table->text('subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sky_card_promotions');
    }
}
