<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArenaOverview extends Model
{
    protected $table = 'arena_overview';

    protected $fillable = [
        'date',
        'site',
        'initial_account_point',
        'current_agent_wallet',
        'current_agent_commission',
        'total_loading',
        'total_load_withdrawal',
        'total_commission_cashout',
        'must_total_players_point',
        'actual_players_point',
        'total_bets',
        'total_rake',
        'rake_without_agent_commission',
        'player_point_difference',
        'initial_agent_commission',
        'total_agent_commission',
        'total_processed_commission',
        'total_unprocessed_commission',
        'commission_difference'
    ];
}
