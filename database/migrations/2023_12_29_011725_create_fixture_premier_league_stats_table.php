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
        Schema::create('fixture_premier_league_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fixture_id');
            $table->unsignedInteger('id_team');
            $table->string('name_team');
            $table->string('place');
            $table->unsignedInteger('shots_on_goal')->nullable();
            $table->unsignedInteger('shots_off_goal')->nullable();
            $table->unsignedInteger('total_shots')->nullable();
            $table->unsignedInteger('blocked_shots')->nullable();
            $table->unsignedInteger('shots_inside_box')->nullable();
            $table->unsignedInteger('shots_outside_box')->nullable();
            $table->unsignedInteger('fouls')->nullable();
            $table->unsignedInteger('corner_kicks')->nullable();
            $table->unsignedInteger('offsides')->nullable();
            $table->string('ball_possession')->nullable();
            $table->unsignedInteger('yellow_cards')->nullable();
            $table->unsignedInteger('red_cards')->nullable();
            $table->unsignedInteger('goalkeeper_saves')->nullable();
            $table->unsignedInteger('total_passes')->nullable();
            $table->unsignedInteger('passes_accurate')->nullable();
            $table->string('passes_percentage')->nullable();
            $table->float('expected_goals')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixture_premier_league_stats');
    }
};
