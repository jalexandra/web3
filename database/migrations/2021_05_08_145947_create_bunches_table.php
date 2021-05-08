<?php

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBunchesTable extends Migration
{
    public function up(): void
    {
        Schema::create('bunches', function (Blueprint $table) {
//            $table->string('order_id')->index();
//            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Order::class)->constrained();
            $table->foreignIdFor(Book::class)->constrained();
            $table->integer('amount')->default(1);
            $table->timestamps();

            $table->primary(['order_id', 'book_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bunches');
    }
}
