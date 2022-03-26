@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Action') }}</div>

                <div class="card-body">
                    <form action="{{ route('arenaoverview.store') }}"
                            enctype="multipart/form-data"
                            method="POST"
                    >
                    @csrf
                    <input type="file" name="import_file" />
                    <button type="submit">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="border-top:20px;">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Datetime</th>
                        <th>Site</th>
                        <th>Initial Account Point</th>
                        <th>Current Agent Wallet</th>
                        <th>Current Agent Commission</th>
                        <th>Total Loading</th>
                        <th>Total Load Withdrawal</th>
                        <th>Total Commission Cashout</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection