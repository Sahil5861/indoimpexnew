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
        Schema::create('dealersplan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_id'); // Dealer ID
            $table->string('name'); // Plan name
            $table->text('description'); // Plan description
            $table->decimal('price', 10, 2); // Plan price
            $table->decimal('special_price', 10, 2)->nullable(); // Special price (nullable)
            $table->date('expiry_date'); // Expiry date of the plan            
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
        Schema::dropIfExists('dealersplan');
    }
};
