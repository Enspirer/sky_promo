<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleCampaignStaticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_campaign_statics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('campaign_id');
            $table->text('email')->nullable();
            $table->text('read_count')->nullable();
            $table->text('click_count')->nullable();
            $table->text('is_failed')->nullable();
            $table->text('target_email_count')->nullable();
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
        Schema::dropIfExists('single_campaign_statics');
    }
}
