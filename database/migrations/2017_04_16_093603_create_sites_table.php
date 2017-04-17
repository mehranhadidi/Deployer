<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('server_id');
            $table->string('domain', 100)->nullable();
            $table->string('doc_root')->nullable();
            $table->string('repository')->nullable();
            $table->boolean('ssl')->default(false);
            $table->boolean('auto_deploy')->default(false);
            $table->timestamps();

            $table->foreign('server_id')
                  ->references('id')
                  ->on('servers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
