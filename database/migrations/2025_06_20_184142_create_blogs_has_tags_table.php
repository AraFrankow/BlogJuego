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
        Schema::create('blogs_has_tags', function (Blueprint $table) {
            $table->foreignId('blog_fk')->constrained(table: 'blogs', column: 'blog_id');
            $table->unsignedSmallInteger('tag_fk');
            $table->foreign('tag_fk')->references('tag_id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_has_tags');
    }
};
