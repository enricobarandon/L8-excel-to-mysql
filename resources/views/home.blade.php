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
                            <input type="file" class="form-control" name="import_file" />
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit">Import</button>
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
            <div class="row" style="border-top:20px;">
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
                            @foreach($arenaOverview as $index => $value)
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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

                        <p>Must Total Players Pointt</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

                        <p>Total Bets</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 overview">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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
                        <h5>452,450,625.0000</h3>

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