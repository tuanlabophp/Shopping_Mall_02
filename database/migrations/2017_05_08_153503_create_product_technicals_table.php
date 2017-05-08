<?php
namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTechnicalsTable extends Migration
{
    /**
     * Run the migrations.
     *product_technicals
     * @return void
     */
    public function up()
    {
        Schema::create('product_technicals', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('product_id');
            $table->increments('technical_id');
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
        Schema::dropIfExists('product_technicals');
    }
}
