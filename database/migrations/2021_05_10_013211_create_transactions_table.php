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
            $table->decimal('value');
            $table->unsignedBigInteger('payer_id');
            $table->unsignedBigInteger('payee_id');
            $table->boolean('authorized')
                  ->default(false);
            $table->integer('authorization_http_status')
                  ->unsigned()
                  ->nullable();
            $table->json('authorization_response')
                  ->nullable()
                  ->default(null);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('payer_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('payee_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['payer_id']);
            $table->dropForeign(['payee_id']);
        });

        Schema::dropIfExists('transactions');
    }
}
