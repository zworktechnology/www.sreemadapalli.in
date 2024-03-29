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
        Schema::create('account_opens', function (Blueprint $table) {

            // Auto-generate ID column
            $table->id();

            // Request columns
            $table->string('date');
            $table->string('amount');
            $table->string('emp_id');
            $table->longText('note');
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
        Schema::dropIfExists('account_opens');
    }
};
