<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user');
            $table->integer('bill')->nullable();;
            $table->integer('eta')->nullable();;
            $table->longtext('complete_file')->nullable();
            $table->integer('status')->default(1);
            $table->integer('ps_status')->default(1);
            $table->integer('tr_id')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
