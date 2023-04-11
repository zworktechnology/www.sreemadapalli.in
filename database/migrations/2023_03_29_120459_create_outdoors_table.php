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
        Schema::create('outdoors', function (Blueprint $table) {

            // Auto-generate ID column
            $table->id();

            // Request columns
            $table->string('name');
            $table->string('contact_number');
            $table->longText('address')->nullable();
            $table->string('booking_date');
            $table->string('delivery_date');
            $table->string('status')->default(0);
            $table->longText('note');
            $table->string('field_title_1')->nullable();
            $table->string('field_unit_1')->nullable();
            $table->string('field_unit_price_1')->nullable();
            $table->string('field_total_1')->nullable();
            $table->string('field_title_2')->nullable();
            $table->string('field_unit_2')->nullable();
            $table->string('field_unit_price_2')->nullable();
            $table->string('field_total_2')->nullable();
            $table->string('field_title_3')->nullable();
            $table->string('field_unit_3')->nullable();
            $table->string('field_unit_price_3')->nullable();
            $table->string('field_total_3')->nullable();
            $table->string('field_title_4')->nullable();
            $table->string('field_unit_4')->nullable();
            $table->string('field_unit_price_4')->nullable();
            $table->string('field_total_4')->nullable();
            $table->string('field_title_5')->nullable();
            $table->string('field_unit_5')->nullable();
            $table->string('field_unit_price_5')->nullable();
            $table->string('field_total_5')->nullable();
            $table->string('field_title_6')->nullable();
            $table->string('field_unit_6')->nullable();
            $table->string('field_unit_price_6')->nullable();
            $table->string('field_total_6')->nullable();
            $table->string('field_title_7')->nullable();
            $table->string('field_unit_7')->nullable();
            $table->string('field_unit_price_7')->nullable();
            $table->string('field_total_7')->nullable();
            $table->string('field_title_8')->nullable();
            $table->string('field_unit_8')->nullable();
            $table->string('field_unit_price_8')->nullable();
            $table->string('field_total_8')->nullable();
            $table->string('field_title_9')->nullable();
            $table->string('field_unit_9')->nullable();
            $table->string('field_unit_price_9')->nullable();
            $table->string('field_total_9')->nullable();
            $table->string('field_title_10')->nullable();
            $table->string('field_unit_10')->nullable();
            $table->string('field_unit_price_10')->nullable();
            $table->string('field_total_10')->nullable();
            $table->string('over_all_total')->nullable();

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
        Schema::dropIfExists('outdoors');
    }
};
