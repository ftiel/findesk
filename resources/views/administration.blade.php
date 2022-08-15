@extends('layouts.admin-layout')

@section('admin-content')
    <div class="admin-control">
        <div class="dashboard">
            <h2 style="text-align: center";>Tickets</h2>
            <br>
            <div class="ticket-watch">
                <h2>Total</h2>
                <h1>{{ count($tickets) }}</h1>
            </div>
            @foreach($status as $key => $stat)
                @if(count($tickets->where('Status', $stat->StatusName)) > 0) 
                    <div class="ticket-watch">
                        <h2>{{ $stat->StatusName }}</h2>
                        <h1>{{ count($tickets->where('Status', $stat->StatusName)) }}</h1>
                    </div>
                @endif
            @endforeach
            <div class="ticket-watch">
                <h2>Closed</h2>
                <h1>{{ count($tickets->where('isClosed', 'Closed')) }}</h1>
            </div>
        </div>
        <div class="ticket-view" id="ticket-view">
            <h2 style="text-align: center";>Open Tickets</h2>
            <br>
            @foreach($tickets->where('isClosed', '') as $t)
                <div class="ticket-info {{ $t->TicketType === 'ServiceRequest' ? 'low' : 'normal' }}">
                    <div class="ticket-id"><a href="/ticket/{{ $t->TicketID }}">{{ $t->TicketID }}</a></div>
                    @if($t->AssignedTo != '')
                        <div class="ticket-client">Client: {{ $t->ClientUsername }} || Assigned to: <strong>{{ $t->AssignedTo }}</strong></div>
                    @else
                        <div class="ticket-client">Client: {{ $t->ClientUsername }}</div>
                    @endif
                    <div class="ticket-date"><i>{{ $t->created_at->diffForHumans() }}</i></div>
                    <div class="ticket-details">{{ $t->DetailedDescription }}</div>
                </div>
                <br>
            @endforeach 
        </div>
    </div>
@endsection