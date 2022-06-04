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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('pric', 8, 2)->default(0);
            $table->decimal('old_price', 8, 2)->default(0);
            $table->boolean('POPULAR')->default(0);
            $table->string('image');
            $table->unsignedBigInteger('categorie_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("categorie_id")->references("id")->on("categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
