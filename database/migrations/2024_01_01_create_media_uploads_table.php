<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('media_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['file', 'link']);
            $table->string('title');
            $table->string('file_path')->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->string('mime_type')->nullable();
            $table->text('external_url')->nullable();
            $table->enum('status', ['pending', 'processed', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_uploads');
    }
};