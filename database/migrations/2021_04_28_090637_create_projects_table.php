<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->bigInteger('sector_id')->unsigned()->index()->nullable();
            $table->foreign('sector_id')
                ->references('id')
                ->on('sectors')
                ->onDelete('cascade');
            $table->string('slug')->unique();
            $table->enum('type',array('Ongoing', 'Completed'));
            $table->string('image')->nullable();
            $table->string('link_url')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_published')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
