@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        
        @if($userType == 'Administrator')
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
        @endif

    </div>

    <div class="card card-primary">
        <div class="card-header">Arena Overview</div>

        <div class="card-body">
            <form action="{{ route('home') }}"
                    method="POST"
            >
                @csrf
                <div class="row">
                    <div class="col-3">
                        <input class="form-control" placeholder="Date From" type="text" id="from" name="from">
                    </div>

                    <div class="col-3">
                        <input class="form-control" placeholder="Date To" type="text" id="to" name="to">

                    </div>

                    <div class="col-2">
                        <select class="form-control" name="site">
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


            @if($userType == 'Administrator')
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
                            {!! $arenaOverview !!}
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class=" card">
                <div class="card-header">
                    <strong><i class="fa fa-align-justify"></i>  ARENA OVERVIEW TOTAL </strong>
                </div> 
                <div class="card-group mb-0">
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-success">{{ number_format($total_initial_account_point, 2) }}</div> 
                            <small class="text-muted text-uppercase font-weight-bold">Initial Account Point </small>
                        </div>
                    </div> 
                    <div class="card border-bottom-0">
                    <div class="card-body pb-1 pt-1">
                        <div class="text-value text-success">{{ number_format($total_current_agent_wallet, 2) }}</div>
                            <small class="text-muted text-uppercase font-weight-bold">Current Agent Wallet</small>
                        </div>
                    </div> 
                    <div class="card border-bottom-0">
                    <div class="card-body pb-1 pt-1">
                        <div class="text-value text-success">{{ number_format($total_current_agent_commission, 2) }}</div>
                            <small class="text-muted text-uppercase font-weight-bold">Current Agent Commission</small>
                        </div>
                    </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-success">{{ number_format($total_total_loading, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Loading</small>
                            </div>
                        </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-danger">{{ number_format($total_total_load_withdrawal, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Load Withdrawal</small>
                            </div>
                        </div> 
                        <div class="card border-bottom-0">
                            <div class="card-body pb-1 pt-1"><div class="text-value text-danger">{{ number_format($total_total_commission_cashout, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Commission Cashout</small>
                            </div>
                        </div>
                    </div> 
                    <div class="card-group mb-0">
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-danger">{{ number_format($total_must_total_players_point, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">*Must Total Player's Point</small>
                            </div>
                        </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value">{{ number_format($total_actual_players_point, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Actual Player's Point</small>
                            </div>
                        </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-success">{{ number_format($total_total_bets, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Bets</small>
                            </div>
                        </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-success">{{ number_format($total_total_rake, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total RAKE</small>
                            </div>
                        </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-success">{{ number_format($total_rake_without_agent_commission, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Rake Without Agent Commission</small>
                            </div>
                        </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-danger">{{ number_format($total_player_point_difference, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Player Point Difference</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-group mb-0">
                        <div class="card border-bottom-0">
                            <div class="card-body pb-1 pt-1">
                                <div class="text-value text-success">{{ number_format($total_initial_agent_commission, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Initial Agent Commission</small>
                                </div>
                            </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-success">{{ number_format($total_total_agent_commission, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Total Agent Commission</small>
                            </div>
                        </div>
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-success">{{ number_format($total_total_processed_commission, 2) }}</div>
                            <small class="text-muted text-uppercase font-weight-bold">Total Processed Commission</small>
                        </div>
                    </div>
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                        <div class="text-value text-success">{{ number_format($total_total_unprocessed_commission, 2) }}</div>
                            <small class="text-muted text-uppercase font-weight-bold">Total UN-Processed Commission</small>
                        </div>
                    </div> 
                    <div class="card border-bottom-0">
                        <div class="card-body pb-1 pt-1">
                            <div class="text-value text-danger">{{ number_format($total_commission_difference, 2) }}</div>
                                <small class="text-muted text-uppercase font-weight-bold">Commission Difference</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>


<link rel="stylesheet" href="css/style.css">
@endsection