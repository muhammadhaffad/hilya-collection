<?php

use App\Models\ProductBrand;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductBrand::class)->nullable()->constrained();
            $table->string('slug')->nullable()->unique();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('status');
            $table->unsignedInteger('berat');
            $table->timestamp('tanggalPost');
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
        Schema::dropIfExists('products');
    }
};
