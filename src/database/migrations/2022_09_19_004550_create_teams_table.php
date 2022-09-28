<?php

use App\Models\Division;
use App\Models\Player;
use App\Models\Season;
use App\Models\Store;
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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name_en', 100);
            $table->string('name_ja', 100)->nullable();
            $table->unsignedTinyInteger('game_type')->comment('0:9ボール / 1:8ボール');
            $table->foreignIdFor(Store::class);
            $table->foreignIdFor(Division::class);
            $table->foreignIdFor(Season::class);
            $table->text('memo')->nullable();
            $table->unsignedTinyInteger('captain_id')->nullable();
            $table->boolean('bd_flag')->default(0);
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
        Schema::dropIfExists('teams');
    }
};
