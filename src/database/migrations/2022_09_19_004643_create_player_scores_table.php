<?php

use App\Models\Player;
use App\Models\ScoreSheet;
use App\Models\SkillLevel;
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
    public function up()
    {
        Schema::create('player_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ScoreSheet::class);
            $table->foreignIdFor(Player::class);
            $table->unsignedTinyInteger('score');
            $table->unsignedTinyInteger('safety')->default(0);
            $table->unsignedTinyInteger('run_out')->default(0);
            $table->unsignedTinyInteger('ace')->default(0);
            $table->unsignedTinyInteger('team_point')->default(0);
            $table->foreignIdFor(SkillLevel::class);
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
        Schema::dropIfExists('player_scores');
    }
};
