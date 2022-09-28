<?php

use App\Models\Award;
use App\Models\Player;
use App\Models\Season;
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
        Schema::create('receive_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Player::class);
            $table->foreignIdFor(Team::class);
            $table->foreignIdFor(Award::class);
            $table->foreignIdFor(Season::class);
            $table->text('memo')->nullable();
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
        Schema::dropIfExists('receive_awards');
    }
};
