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
        Schema::create('khetis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('auth_id');
            $table->bigInteger('account_id');
            $table->text('account_holder_name');
            $table->double('mulatvi', 8, 2);
            $table->double('sarkari', 8, 2);
            $table->double('local', 8, 2);
            $table->double('farti', 8, 2);
            $table->double('total', 8, 2);
            $table->double('chhut', 8, 2);
            $table->double('past_jadde', 8, 2)->nullable();
            $table->double('charges_arrival', 8, 2)->nullable();
            $table->double('total_collection', 8, 2)->nullable();
            $table->double('chargeable', 8, 2)->nullable();
            $table->double('remaining', 8, 2)->nullable();
            $table->double('next_year_jadde', 8, 2)->nullable();
            $table->bigInteger('receipt_no')->nullable();
            $table->date('receipt_date')->nullable();
            $table->double('b_adhi', 8, 2)->nullable();
            $table->double('total_demand', 8, 2)->nullable();
            $table->double('total_receipt_collection', 8, 2)->nullable();
            $table->string('year')->nullable();
            $table->bigInteger('book_no')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khetis');
    }
};
