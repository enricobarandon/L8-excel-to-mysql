@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">{{ __('Action') }}</div>

                <div class="card-body">
                    <form action="{{ route('arenaoverview.store') }}"
                            enctype="multipart/form-data"
                            method="POST"
                    >
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <input type="file" class="form-control @error('email') is-invalid @enderror" name="import_file" />
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" type="submit">Import</button>
                            </div>
                            <div class="col-5">
                                @include('flash-message')
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">Arena Overview</div>

        <div class="card-body">
            <form action="{{ route('home') }}"
                    method="POST"
            >
                @csrf
                <div class="row">
                    <div class="col-9">
                        <label for="from">From</label>
                        <input type="text" id="from" name="from">
                        <label for="to">to</label>
                        <input type="text" id="to" name="to">

                        <select name="site">
                            <option selected value="all"> -- ALL SITES --</option>
                            <option value="WPC2021">WPC2021</option>
                            <option value="WPC2022">WPC2022</option>
                        </select>

                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ url('/home') }}" class="btn btn-danger">Reset</a>
                    </div>
                </div>
            </form>

            <div class="row" style="border-top:20px;margin-top:20px;">
                <div class="col-md-12">
                    <table class="table table-striped arena-overview">
                        <thead>
                            <tr>
                                <th>Event Date</th>
                                <th>Site</th>
                                <th>Initial Account Point</th>
                                <th>Current Agent Wallet</th>
                                <th>Current Agent Commission</th>
                                <th>Total Loading</th>
                                <th>Total Load Withdrawal</th>
                                <th>Total Commission Cashout</th>
                                <th>Must Total Players Point</th>
                                <th>Actual Players Point</th>
                                <th>Total Bets</th>
                                <th>Total Rake</th>
                                <th>Rake Without Agent Commission</th>
                                <th>Player Point Difference</th>
                                <th>Initial Agent Commission</th>
                                <th>Total Agent Commission</th>
                                <th>Total Processed Commission</th>
                                <th>Total Unprocessed Commission</th>
                                <th>Commission Difference</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $total_initial_account_point = 0;
                                $total_current_agent_wallet = 0;
                                $total_current_agent_commission = 0;
                                $total_total_loading = 0;
                                $total_total_load_withdrawal = 0;
                                $total_total_commission_cashout = 0;
                                $total_must_total_players_point = 0;
                                $total_actual_players_point = 0;
                                $total_total_bets = 0;
                                $total_total_rake = 0;
                                $total_rake_without_agent_commission = 0;
                                $total_player_point_difference = 0;
                                $total_initial_agent_commission = 0;
                                $total_total_agent_commission = 0;
                                $total_total_processed_commission = 0;
                                $total_total_unprocessed_commission = 0;
                                $total_commission_difference = 0;
                            @endphp

                            @foreach($arenaOverview as $index => $value)
                                @php
                                    $total_initial_account_point += floatval($value->initial_account_point);
                                    $total_current_agent_wallet += $value->current_agent_wallet;
                                    $total_current_agent_commission += $value->current_agent_commission;
                                    $total_total_loading += $value->total_loading;
                                    $total_total_load_withdrawal += $value->total_load_withdrawal;
                                    $total_total_commission_cashout += $value->total_commission_cashout;
                                    $total_must_total_players_point += $value->must_total_players_point;
                                    $total_actual_players_point += $value->actual_players_point;
                                    $total_total_bets += $value->total_bets;
                                    $total_total_rake += $value->total_rake;
                                    $total_rake_without_agent_commission += $value->rake_without_agent_commission;
                                    $total_player_point_difference += $value->player_point_difference;
                                    $total_initial_agent_commission += $value->initial_agent_commission;
                                    $total_total_agent_commission += $value->total_agent_commission;
                                    $total_total_processed_commission += $value->total_processed_commission;
                                    $total_total_unprocessed_commission += $value->total_unprocessed_commission;
                                    $total_commission_difference += $value->commission_difference;
                                @endphp
                                <tr>
                                    <td>{{ $value->date }}</td>
                                    <td>{{ $value->site }}</td>
                                    <td>{{ number_format($value->initial_account_point,2) }}</td>
                                    <td>{{ number_format($value->current_agent_wallet,2) }}</td>
                                    <td>{{ number_format($value->current_agent_commission,2) }}</td>
                                    <td>{{ number_format($value->total_loading,2) }}</td>
                                    <td>{{ number_format($value->total_load_withdrawal,2) }}</td>
                                    <td>{{ number_format($value->total_commission_cashout,2) }}</td>
                                    <td>{{ number_format($value->must_total_players_point,2) }}</td>
                                    <td>{{ number_format($value->actual_players_point,2) }}</td>
                                    <td>{{ number_format($value->total_bets,2) }}</td>
                                    <td>{{ number_format($value->total_rake,2) }}</td>
                                    <td>{{ number_format($value->rake_without_agent_commission,2) }}</td>
                                    <td>{{ number_format($value->player_point_difference,2) }}</td>
                                    <td>{{ number_format($value->initial_agent_commission,2) }}</td>
                                    <td>{{ number_format($value->total_agent_commission,2) }}</td>
                                    <td>{{ number_format($value->total_processed_commission,2) }}</td>
                                    <td>{{ number_format($value->total_unprocessed_commission,2) }}</td>
                                    <td>{{ number_format($value->commission_difference,2) }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-header">Arena Overview Total</div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_initial_account_point, 2) }}</h3>

                        <p>Initial Account Point</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_current_agent_wallet, 2) }}</h3>

                        <p>Current Agent Wallet</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_current_agent_commission, 2) }}</h3>

                        <p>Current Agent Commission</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_loading, 2) }}</h3>

                        <p>Total Loading</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_load_withdrawal, 2) }}</h3>

                        <p>Total Load Withdrawal</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_commission_cashout, 2) }}</h3>

                        <p>Total Commission Cashout</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>

                <!-- <div classc="clearfix"></div> -->

                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_must_total_players_point, 2) }}</h3>

                        <p>Must Total Players Point</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_actual_players_point, 2) }}</h3>

                        <p>Actual Players Point</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_bets, 2) }}</h3>

                        <p>Total bets</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_rake, 2) }}</h3>

                        <p>Total Rake</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_initial_agent_commission, 2) }}</h3>

                        <p>Initial Agent Commission</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_agent_commission, 2) }}</h3>

                        <p>Total Agent Commission</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_rake_without_agent_commission, 2) }}</h3>

                        <p>Rake Without Agent Commission</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <!-- <div class="clearfix"></div> -->
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_player_point_difference, 2) }}</h3>

                        <p>Player Point Difference</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_processed_commission, 2) }}</h3>

                        <p>Total Processed Commission</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_total_unprocessed_commission, 2) }}</h3>

                        <p>Total Unprocessed Commission</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>{{ number_format($total_commission_difference, 2) }}</h3>

                        <p>Commission Difference</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" href="css/style.css">
@endsection