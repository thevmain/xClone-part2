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
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->text("description")->nullable();
            $table->string("avatar")->nullable();
            $table->string("banner")->nullable();
            $table->foreignId("creator_id")->constrained("users")->onDelete("cascade");
            $table->timestamps();
        });

        Schema::create('community_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId("community_id")->coconstrained()->onDelete("cascade");
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->enum("role", ["member", "moderator", "admin"])->default("member");
            $table->timestamps();

            $table->unique(["community_id", "user_id"]);
            $table->index("user_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
        Schema::dropIfExists('community_members');
    }
};
