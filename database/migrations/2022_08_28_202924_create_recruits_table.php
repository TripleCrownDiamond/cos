<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('shops')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('recruits');
    }
}
