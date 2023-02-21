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
        Schema::create('determinations', function (Blueprint $table) {

            // Auto-generate ID column
           $table->id();

           // Request columns
           $table->string('date');
           $table->string('count_2000');
           $table->string('total_2000');
           $table->string('count_500');
           $table->string('total_500');
           $table->string('count_200');
           $table->string('total_200');
           $table->string('count_100');
           $table->string('total_100');
           $table->string('count_50');
           $table->string('total_50');
           $table->string('count_20');
           $table->string('total_20');
           $table->string('count_10');
           $table->string('total_10');
           $table->string('count_5');
           $table->string('total_5');
           $table->string('count_2');
           $table->string('total_2');
           $table->string('count_1');
           $table->string('total_1');
           $table->string('total');
           $table->boolean('soft_delete')->default(0);

           // CreatedAt & UpdatedAt columns
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
        Schema::dropIfExists('determinations');
    }
};
