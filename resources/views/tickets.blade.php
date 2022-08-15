@extends('layouts.admin-layout')

@section('admin-content')
    <div class="admin-tickets">
        {{-- <div></div> --}}
        <div class="tickets-filtered" id="tickets-filtered">
            {{-- @forelse($tickets as $index => $t)
                <div class="ticket-info {{ $t->Priority === 'High' ? 'high' : ($t->Priority === 'Normal' ? 'normal' : 'low' ) }}">
                    <div class="ticket-id"><a href="/ticket/{{ $t->TicketID }}">{{ $t->TicketID }}</a></div>
                    <div class="ticket-client">
                        @if($t->AssignedTo != '')
                            <strong>Client: {{ $t->ClientUsername }} || Assigned to: {{ $t->AssignedTo }}</strong>
                        @else
                            <strong>Client: {{ $t->ClientUsername }}</strong>
                        @endif
                    </div>
                    <div class="ticket-date"><i>{{ $t->CreatedAtDiffed }}</i></div>
                    <div class="ticket-details">{{ $t->DetailedDescription }}</div>
                </div>
                <br>
            @empty
                <h1 style="text-align: center;">NO DATA FOUND!</h1>
            @endforelse  --}}

            <table id="filtered-tickets-table" class="data-table cell-border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ticket ID</th>
                        <th>Created</th>
                        <th>Client</th>
                        <th>Details</th>
                        <th>Assigned</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $index => $t)
                    <tr> 
                            <td>{{ $t->id }}</td>
                            <td class="ticket-link"><strong><a href="/ticket/{{ $t->TicketID }}">{{ $t->TicketID }}</a></strong></td>
                            <td>{{ $t->CreatedAtDiffed }} </td>
                            <td>{{ $t->ClientUsername }}</td>
                            <td>{{ $t->DetailedDescription }}</td>
                            @if($t->AssignedTo != '')
                                <td>{{ $t->AssignedTo }}</td>
                            @else
                                <td>N/A</td>
                            @endif
                            <td class="{{ $t->Status === 'Resolved' ? 'low-inverted' : ($t->Status === 'Unassigned' ? 'high-inverted' : 'normal-inverted') }}">{{ $t->Status }}</td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
           
        </div>
        {{-- <div></div> --}}
    </div>
@endsection