<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignAddresses extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table){
            $table->foreign('shipping_id')->references('id')->on('addresses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('billing_id')->references('id')->on('addresses')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table){
            $table->dropForeign(['shipping_id', 'billing_id']);
        });
    }
}
