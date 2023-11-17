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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->enum("type", ["comment", "update", "create"]);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("recipient_id");
            $table->boolean("is_seen")->default(0);
            $table->unsignedBigInteger("blog_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
