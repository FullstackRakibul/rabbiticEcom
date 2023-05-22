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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blogTitle');
            $table->string('blogMetaTitle')->nullable();
            $table->string('blogMetaDescription')->nullable();
            $table->string('blogMetaKeywords')->nullable();
            $table->string('blogSlug')->nullable();
            $table->text('blogContent');
            $table->string('blogImage')->nullable();
            $table->string('blogImageAlt')->nullable();
            $table->enum('status', ['published', 'draft', 'deleted'])->default('draft');
            $table->string('blogCategory')->nullable();
            $table->string('blogTag')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
