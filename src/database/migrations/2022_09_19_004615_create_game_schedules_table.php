<?php

use App\Models\Division;
use App\Models\Season;
use App\Models\Store;
use App\Models\Team;
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
        Schema::create('game_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Division::class);
            $table->foreignIdFor(Team::class)->index();
            $table->foreignIdFor(Season::class);
            $table->foreignIdFor(Store::class)->nullable();
            $table->unsignedTinyInteger('week');
            $table->date('target_date');
            $table->text('memo')->nullable();
            $table->integer('carry_on_flg')->default(1)->comment('実施有無 0:無/1:有/10:Bye');
            $table->integer('match_kind')->default(0)->comment('試合種別 0:通常/10:TriCup/20:TKC/100:ラスベガス');
            $table->integer('opponent_team_id')->nullable()->comment('対戦チームのチームID');
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
        Schema::dropIfExists('game_schedules');
    }
};
