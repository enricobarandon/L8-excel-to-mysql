<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArenaOverviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arena_overview', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable();
            $table->string('site', 25);
            $table->float('initial_account_point', 20, 2);
            $table->float('current_agent_wallet', 20, 2);
            $table->float('current_agent_commission', 20, 2);
            $table->float('total_loading', 20, 2);
            $table->float('total_load_withdrawal', 20, 2);
            $table->float('total_commission_cashout', 20, 2);
            $table->float('must_total_players_point', 20, 2);
            $table->float('actual_players_point', 20, 2);
            $table->float('total_bets', 20, 2);
            $table->float('total_rake', 20, 2);
            $table->float('rake_without_agent_commission', 20, 2);
            $table->float('player_point_difference', 20, 2);
            $table->float('initial_agent_commission', 20, 2);
            $table->float('total_agent_commission', 20, 2);
            $table->float('total_processed_commission', 20, 2);
            $table->float('total_unprocessed_commission', 20, 2);
            $table->float('commission_difference', 20, 2);
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
        Schema::dropIfExists('arena_overview');
    }
}
