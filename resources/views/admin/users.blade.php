@extends('layouts.app')

@section('content')

<table class='table'>
    <thead>
        <th>#</th>
        <th>Role</th>
        <th>Full name</th>
        <th>Email</th>
        <th>--</th>
    </thead>
    <tbody>{!! $users !!}</tbody>
</table>

@endsection