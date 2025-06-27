<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // User making the offer
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Order being offered for

            $table->decimal('price', 10, 2)->nullable();
            $table->string('currency')->default('EUR'); // EUR / USD
            $table->decimal('extra_costs', 10, 2)->nullable();
            $table->text('extra_costs_info')->nullable();

            $table->date('start_date')->nullable();
            $table->date('deadline')->nullable();
            $table->text('comments')->nullable();

            $table->boolean('agreed_to_terms')->default(false); // required checkbox
            $table->string('attachment')->nullable(); // optional file (PDF, doc, etc.)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

