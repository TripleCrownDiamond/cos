<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompleteRenewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_renews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('current_formula_id')->constrained('formulas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('new_formula_id')->constrained('formulas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('complete_renews');
    }
}
