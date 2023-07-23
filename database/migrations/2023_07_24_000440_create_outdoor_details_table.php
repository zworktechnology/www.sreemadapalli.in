<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdoor_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('outdoor_id');
            $table->foreign('outdoor_id')->references('id')->on('outdoors')->onDelete('cascade');

            $table->string('outdoor_product')->nullable();
            $table->string('outdoor_unit')->nullable();
            $table->string('outdoor_price')->nullable();
            $table->string('outdoor_total')->nullable();
            $table->boolean('soft_delete')->default(0);

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
        Schema::dropIfExists('outdoor_details');
    }
};
