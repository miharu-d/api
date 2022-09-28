<?php

use App\Models\GameSchedule;
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
        Schema::create('score_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('first_player_score_id');
            $table->integer('second_player_score_id');
            $table->foreignIdFor(GameSchedule::class);
            $table->unsignedTinyInteger('inning');
            $table->softDeletes();
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
        Schema::dropIfExists('score_sheets');
    }
};
