<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_information', function (Blueprint $table) {
            $table->id();
            $table->string('checkout_kodecheckout')->unique();
            $table->foreign('checkout_kodecheckout')
                ->references('kodecheckout')->on('checkouts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('namalengkap');
            $table->string('notlp');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('alamat');
            $table->string('kurir');
            $table->string('kurirservice');
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
        Schema::dropIfExists('checkout_information');
    }
};
