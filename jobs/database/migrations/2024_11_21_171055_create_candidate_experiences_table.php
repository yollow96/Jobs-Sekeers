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
        Schema::create('candidate_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('candidate_id');
            $table->string('experience_title');
            $table->string('company');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('currently_working')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('country_id')->references('id')->on('countries')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('state_id')->references('id')->on('states')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_experience');
    }
};
