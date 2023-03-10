<?php

use App\Models\Color;
use App\Models\Product;
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
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Color::class)->onUpdate('cascade')->onDelete('restrict');
            $table->string('ukuran');
            $table->unsignedInteger('jumlah')->nullable();
            $table->unsignedInteger('harga')->nullable();
            $table->unsignedInteger('diskon')->default(0);
            $table->smallInteger('jenis', false, true);
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
        Schema::dropIfExists('product_prices');
    }
};
