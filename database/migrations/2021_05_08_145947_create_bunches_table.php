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
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Book::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
