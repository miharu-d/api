<?php

use App\Models\User;
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
        Schema::create('member_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->date('target_date');
            $table->unsignedTinyInteger('kind')->comment('1:可 / 2:不可 / 3:未定');
            $table->boolean('participate_flg')->nullable();
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
        Schema::dropIfExists('member_schedules');
    }
};
