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
        Schema::create('hashtags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer("post_count")->default(0);
            $table->integer("daily_post_count")->default(0);
            $table->timestamps();

            $table->index("name");
            $table->index(["daily_post_count", "created_at"]);
        });

        Schema::create('hastag_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId("hashtag_id")->constrained()->onDelete('cascade');
            $table->foreignId("post_id")->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(["hashtag_id", "post_id"]);
            $table->index("hashtag_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtags');
        Schema::dropIfExists("hashtag_post");
    }
};
