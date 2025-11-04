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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content')->nullable();
            $table->foreignId("parent_id")->nullable()->constrained('posts')->onDelete('cascade');
            $table->boolean("is_repost")->default(false);
            $table->foreignId("original_post_id")->nullable()->constrained('posts')->onDelete('cascade');
            $table->enum("reply_permission", ["everyone", "following", "mentioned"])->default("everyone");
            $table->integer("replies_count")->default(0);
            $table->integer("reposts_count")->default(0);
            $table->integer("views_count")->default(0);
            $table->integer("bookmarks_count")->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(["user_id", "created_at"]);
            $table->index("parent_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
