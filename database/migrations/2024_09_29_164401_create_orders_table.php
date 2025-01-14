<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->foreignId('UserID')->constrained('users', 'UserID');
            $table->foreignId('AddressID')->constrained('addresses', 'AddressID');
            $table->foreignId('CartID')->constrained('carts', 'CartID');
            $table->decimal('TotalAmount',10,2);
            $table->foreignId('OrderStatusID')->constrained('order_statuses', 'OrderStatusID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
