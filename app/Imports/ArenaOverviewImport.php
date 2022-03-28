<?php

namespace App\Imports;

use App\ArenaOverview;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Carbon;

class ArenaOverviewImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $date = Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']));
        // dd($date);
        return new ArenaOverview([
            'date' => $date,
            'site' => $row['site'],
            'initial_account_point' => $row['initial_account_point'],
            'current_agent_wallet' => $row['current_agent_wallet'],
            'current_agent_commission' => $row['current_agent_commission'],
            'total_loading' => $row['total_loading'],
            'total_load_withdrawal' => $row['total_load_withdrawal'],
            'total_commission_cashout' => $row['total_commission_cashout'],
            'must_total_players_point' => $row['must_total_players_point'],
            'actual_players_point' => $row['actual_players_point'],
            'total_bets' => $row['total_bets'],
            'total_rake' => $row['total_rake'],
            'rake_without_agent_commission' => $row['rake_without_agent_commission'],
            'player_point_difference' => $row['player_point_difference'],
            'initial_agent_commission' => $row['initial_agent_commission'],
            'total_agent_commission' => $row['total_agent_commission'],
            'total_processed_commission' => $row['total_processed_commission'],
            'total_unprocessed_commission' => $row['total_unprocessed_commission'],
            'commission_difference' => $row['commission_difference']
        ]);
    }

    public function rules(): array
    {
        return [
            'date' => 'required',
            'site' => 'required|string',
            'initial_account_point' => 'required|numeric',
            'current_agent_wallet' => 'required|numeric',
            'current_agent_commission' => 'required|numeric',
            'total_loading' => 'required|numeric',
            'total_load_withdrawal' => 'required|numeric',
            'total_commission_cashout' => 'required|numeric',
            'must_total_players_point' => 'required|numeric',
            'actual_players_point' => 'required|numeric',
            'total_bets' => 'required|numeric',
            'total_rake' => 'required|numeric',
            'rake_without_agent_commission' => 'required|numeric',
            'player_point_difference' => 'required|numeric',
            'initial_agent_commission' => 'required|numeric',
            'total_agent_commission' => 'required|numeric',
            'total_processed_commission' => 'required|numeric',
            'total_unprocessed_commission' => 'required|numeric',
            'commission_difference' => 'required|numeric'
        ];
    }
}
