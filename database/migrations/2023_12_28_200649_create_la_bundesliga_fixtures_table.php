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
        Schema::create('la_bundesliga_fixtures', function (Blueprint $table) {
            $table->id();
            $table->date('fixture_date');
            $table->unsignedBigInteger('fixture_id');
            $table->string('fixture_referee')->nullable();
            $table->string('fixture_timestamp');
            $table->unsignedInteger('goals_away');
            $table->unsignedInteger('goals_home');
            $table->string('league_country');
            $table->unsignedBigInteger('league_id');
            $table->string('league_name');
            $table->string('league_round');
            $table->string('league_season');
            $table->unsignedBigInteger('teams_home_id');
            $table->string('teams_home_name');
            $table->string('teams_home_logo')->nullable();
            $table->boolean('teams_home_winner')->nullable();
            $table->unsignedBigInteger('teams_away_id');
            $table->string('teams_away_name');
            $table->string('teams_away_logo')->nullable();
            $table->boolean('teams_away_winner')->nullable();
            $table->unsignedInteger('score_extratime_home')->nullable();
            $table->unsignedInteger('score_extratime_away')->nullable();
            $table->unsignedInteger('score_fulltime_home');
            $table->unsignedInteger('score_fulltime_away');
            $table->unsignedInteger('score_halftime_home');
            $table->unsignedInteger('score_halftime_away');
            $table->unsignedInteger('score_penalty_home')->nullable();
            $table->unsignedInteger('score_penalty_away')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('la_bundesliga_fixtures');
    }
};
