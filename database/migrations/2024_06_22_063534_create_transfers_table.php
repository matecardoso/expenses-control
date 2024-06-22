<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->float('amount', 8, 2);
            $table->date('date');
            $table->foreignId('origin_account_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('destination_account_id')->constrained('accounts')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
