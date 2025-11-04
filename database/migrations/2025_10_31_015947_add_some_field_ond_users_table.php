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
        Schema::table('users', function (Blueprint $table) {
            $table->string("username")->nullable()->unique()->after("name");
            $table->text("bio")->nullable()->after("email");
            $table->string("avatar")->nullable()->after("bio");
            $table->string("banner")->nullable()->after("avatar");
            $table->string("location")->nullable()->after("banner");
            $table->string("website")->nullable()->after("location");
            $table->date("birth_date")->nullable()->after("website");
            $table->boolean("is_verified")->default(false)->after("birth_date");
            $table->boolean("is_private")->default(false)->after("is_verified");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                "username",
                "bio",
                "avatar",
                "banner",
                "location",
                "website",
                "birth_date",
                "is_verified",
                "is_private",
            ]);
        });
    }
};
