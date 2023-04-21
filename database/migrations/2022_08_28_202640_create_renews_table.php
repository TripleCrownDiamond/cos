<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formula_id')->constrained('formulas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('agency_id')->constrained('agencies')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('duration');
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
        Schema::dropIfExists('renews');
    }
}
