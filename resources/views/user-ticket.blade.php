@extends('layouts.main-layout')

@section('content')
    <div class="view-ticket-details">
        
        <h2 class="title">TICKET DETAILS FOR: {{ $ticket->TicketID }}</h2>
        <div class="form-group ticket-table">
            <div class="short-text">
                <table class="view-ticket-table">
                    <tr>
                        <td>CLIENT USERNAME</td>
                        <td>:</td>
                        <td>{{ $ticket->ClientUsername }}</td>
                    </tr>
                    <tr>
                        <td>DEPARTMENT</td>
                        <td>:</td>
                        <td>{{ $ticket->Department }}</td>
                    </tr>
                    <tr>
                        <td>CATEGORY</td>
                        <td>:</td>
                        <td>{{ $ticket->category->CategoryDescription }}</td>
                    </tr>
                    <tr>
                        <td>SUB-CATEGORY</td>
                        <td>:</td>
                        @if($ticket->SubCategory == 404)
                            <td>Others</td>
                        @else
                            <td>{{ $ticket->sub_category->SubCategoryDescription }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>TICKET STATUS</td>
                        <td>:</td>
                        <td>{{ $ticket->Status }}</td>
                    </tr>
                    <tr>
                        <td>PRIORITY LEVEL</td>
                        <td>:</td>
                        <td>{{ $ticket->priority->PriorityDescription }}</td>
                    </tr>
                    <tr>
                        <td>PC NAME</td>
                        <td>:</td>
                        <td>{{ $ticket->PC_IP }}</td>
                    </tr>
                    <tr>
                        <td>TRANSACTION DATE</td>
                        <td>:</td>
                        <td>{{ $ticket->TransactionDate }}</td>
                    </tr>
                    <tr>
                        <td>APPROVER</td>
                        <td>:</td>
                        <td>{{ $ticket->Approver }}</td>
                    </tr>
                    <tr>
                        <td>ASSIGNED TO</td>
                        <td>:</td>
                        <td>
                            @if($ticket->AssignedTo != '')
                                {{ $ticket->AssignedTo }}
                            @else
                                Not yet assigned.
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="long-text">
                <h3>DETAILED DESCRIPTION OF THE ISSUE:</h3>
                <br>
                <p>{{ $ticket->DetailedDescription }}</p>
            </div>
        </div>

        <div class="form-group ticket-image-notes">
            <div class="attachment">
                @if($ticket->Attachment) 
                <img src=" {{ $ticket->Attachment }} " alt="ATTACHMENT" class="attachment">
                @else 
                <img src="" alt="ATTACHMENT" class="attachment">
                @endif
            </div>
            <div class="notes">
                <h3>Ticket Notes:</h3>
                <div class="notes-list scroll-bottom" id="notes-list">
                    @foreach($notes as $n => $note)
                        <div class="note-details">
                            <span class="uname"><strong>{{ $note->Sender }}: </strong></span>
                            <span class="note-msg">{{ $note->Message }} </span>
                        </div>
                    @endforeach
                </div>
                <div class="send-notes">
                    <form action="/my-ticket/{{ $ticket->TicketID }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="noteTicket" id="" value="{{ $ticket->TicketID }}">
                        <input type="hidden" name="noteSender" value="{{ session('username') }}">
                        {{-- @if($ticket->AssignedTo)
                            <textarea name="noteMessage" id="" rows="4"></textarea>
                            <button class="btn-comment">SEND</button> --}}
                            @if($ticket->Status == 'Resolved ')
                                <textarea name="noteMessage" id="" rows="4" disabled></textarea>
                                <button class="btn-comment" disabled>SEND</button>
                            @else
                                <textarea name="noteMessage" id="" rows="4" required></textarea>
                                <button class="btn-comment">SEND</button>
                            @endif
                        {{-- @else
                            <textarea name="noteMessage" id="" rows="4" disabled></textarea>
                            <button class="btn-comment" disabled>SEND</button>
                        @endif --}}
                    </form>
                </div>
            </div>
        </div>

        <br>
    </div>

@endsection