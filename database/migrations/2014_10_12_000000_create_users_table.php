<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone')->unique();
            $table->string('whatsapp')->nullable();
            $table->string('email')->unique();
            $table->float('balance', 12, 2)->default(0);
            $table->float('earnings' , 12, 2)->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_root')->default(false);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('agency_id')->constrained('agencies')->onDelete('restrict')->onUpdate('restrict');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
