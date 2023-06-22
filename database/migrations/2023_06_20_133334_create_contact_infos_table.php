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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('alternate_email')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('phone_ext')->nullable();
            $table->string('mobile', 50);
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city', 128);
            $table->string('state', 32);
            $table->string('country', 32);
            $table->string('zipcode', 10);
            $table->string('image')->nullable();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
