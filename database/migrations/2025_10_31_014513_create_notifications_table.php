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
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->foreignId("actor_id")->constrained("users")->onDelete('cascade');
            $table->enum("type", ["like", "repost", "follow", "mention"]);
            $table->foreignId("post_id")->nullable()->constrained()->onDelete('cascade');
            $table->boolean("is_read")->default(false);
            $table->timestamps();

            $table->index(["user_id", "is_read", "created_at"]);
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
