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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_street_address');
            $table->string('client_city');
            $table->string('client_postal_code');
            $table->string('client_country');
            $table->string('street_address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->timestamp('invoice_date');
            $table->string('payment_terms');
            $table->text('project_description');
            $table->json('item_list');
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
