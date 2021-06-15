<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignStaticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_statics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('campaign_id');
            $table->text('user_id');
            $table->text('email_view_count')->nullable();
            $table->text('email_send_count')->nullable();
            $table->text('unsubcibe_count')->nullable();
            $table->text('taget_email_count')->nullable();
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
        Schema::dropIfExists('campaign_statics');
    }
}
