<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedSmallInteger('order')->default(1);
            $table->datetime('available_at');
            $table->datetime('expires_in')->nullable();
            $table->foreignId('home_section_id');
            $table->timestamps();

            $table->foreign('home_section_id')->references('id')->on('home_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
