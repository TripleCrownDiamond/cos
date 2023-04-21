<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float("amount", 12, 2);
            $table->string("txid");
            $table->string("type");
            $table->foreignId("user_id")->constrained('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId("agency_id")->constrained('agencies')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId("renew_id")->constrained('renews')->onDelete('restrict')->onUpdate('restrict')->nullable();
            $table->foreignId("complete_renew_id")->constrained('complete_renews')->onDelete('restrict')->onUpdate('restrict')->nullable();
            $table->foreignId("recruit_id")->constrained('recruits')->onDelete('restrict')->onUpdate('restrict')->nullable();

            // $table->foreignId("agency_id");
            // $table->foreignId("user_id");
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
        Schema::dropIfExists('transactions');
    }
}
