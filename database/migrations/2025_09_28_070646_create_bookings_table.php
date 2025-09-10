<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
// database/migrations/xxxx_create_bookings_table.php
public function up(): void
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('event_id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('event_title');
        $table->date('event_date');
        $table->time('event_time');
        $table->string('event_location')->nullable();
        $table->string('event_duration')->nullable();
        $table->string('event_organizer')->nullable();
        $table->date('booking_date');
        $table->time('booking_time');
        $table->string('status')->default('confirmed');
        $table->string('user_name')->nullable();
        $table->string('user_email')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
