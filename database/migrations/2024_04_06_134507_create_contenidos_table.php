<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->enum('Type', ['Movie', 'Series']);
            $table->enum('Genre', ['Comedy', 'Drama', 'Action', 'Musical', 'Horror']);
            $table->date('ReleaseDate');
            $table->enum('Platform', ['NETFLIX', 'HBO', 'PrimeVideo', 'AppleTV', 'Disney+']);
            $table->decimal('Rating')->default('0.00');
            $table->string('URL')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE contenidos ADD Img LONGBLOB");
        DB::statement("ALTER TABLE contenidos 
        MODIFY COLUMN Img LONGBLOB AFTER slug");

        DB::statement("ALTER TABLE contenidos ADD Sinopsis LONGBLOB");
        DB::statement("ALTER TABLE contenidos 
        MODIFY COLUMN Sinopsis LONGBLOB AFTER Img");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos');
    }
};
