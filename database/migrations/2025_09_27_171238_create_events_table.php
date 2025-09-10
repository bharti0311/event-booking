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
public function up(): void
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->date('event_date');
        $table->time('event_time');
        $table->string('duration');
        $table->string('location');
        $table->text('attachments')->nullable(); // store JSON
        $table->text('team_members')->nullable(); // JSON
        $table->text('guests')->nullable(); // JSON
        $table->text('notify')->nullable(); // JSON
        $table->string('reminder')->nullable();
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
        Schema::dropIfExists('events');
    }
};
