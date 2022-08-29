<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
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
            $table->string('selector');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->foreign('menu_id')->on('menus')->references('id')->onDelete('set null');
            $table->integer('serial_no');
            $table->string('menu_name');
            $table->string('route_name');
            $table->string('route_url');
            $table->string('icon')->nullable();
            $table->integer('sidebar_visibility')->default(1)->comment('1 = On & 0 = Off');
            $table->integer('status')->default(1)->comment('1 = Active & 0 = Inactive');
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
        Schema::dropIfExists('menus');
    }
}
