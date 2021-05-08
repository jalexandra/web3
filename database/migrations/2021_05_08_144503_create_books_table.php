<?php

use App\Models\Author;
use App\Models\Image;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(Author::class)->constrained();
            $table->foreignIdFor(Image::class)->nullable()->constrained();
            $table->text('description');
            $table->integer('stock')->default(0)->unsigned();
            $table->float('price')->default(3999)->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
}
