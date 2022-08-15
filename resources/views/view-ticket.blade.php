@extends('layouts.main-layout')

@section('content')
<h2 style="text-align: center;">Ticket ID: {{ $ticket->TicketID }}</h2>
        <div class="form-group" id="admin-view">
            <div class="left">
                <label for="">CLIENT USERNAME</label>
                <input type="text" name="ClientUsername" class="form-control" value="{{ $ticket->ClientUsername }}" readonly>
                <label for="">DEPARTMENT</label>
                <input type="text" name="Department" class="form-control" value="{{ $ticket->Department }}" readonly>
                <label for="">CATEGORY</label>
                <input type="text" name="Category" class="form-control" value="{{ $category->CategoryDescription }}" readonly>
                <label for="">SUB-CATEGORY</label>
                <input type="text" name="SubCategory" class="form-control" value="{{ $subcat->SubCategoryDescription }}" readonly>

                <form action="/ticket/{{ $ticket->TicketID }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="hidden" name="hidden_id" value="{{ $ticket->TicketID }}">
                        <label for="">TICKET STATUS</label><br>
                        @if($ticket->AssignedTo != NULL)
                            @if($ticket->Status == 'Resolved' && $ticket->isClosed != 'Closed')
                                <input type="text" name="" class="form-control" value="{{ $ticket->Status }}" readonly>
                                <input type="hidden" name="isClosed" value="Closed">
                                <button class="btn-accept">Close</button>
                            @elseif($ticket->Status == 'Resolved' && $ticket->isClosed == 'Closed')
                                <input type="text" name="" class="form-control" value="{{ $ticket->Status }}" readonly>
                                <button class="btn-accept" disabled>Close</button>
                            @else
                            <select name="Status" id="" required class="">
                                <option value="{{ $ticket->Status }}">{{ $ticket->Status }}</option>
                                @foreach($stats->where('StatusName', '!=', $ticket->Status) as $key => $stat)
                                    <option value="{{ $stat->StatusName }}">{{ $stat->StatusName }}</option>
                                @endforeach
                                {{-- <option value="Open">Open</option>
                                <option value="Pending">Pending</option>
                                <option value="Resolved">Resolved</option> --}}
                            </select>
                                @if($ticket->AssignedTo == session('username'))
                                    <button class="btn-accept">Update</button>
                                @else
                                <button class="btn-accept" disabled>Update</button>
                                @endif
                            @endif
                        @else
                            <input type="text" name="Status" class="form-control" value="{{ $ticket->Status }}" readonly>
                            <button class="btn-accept" disabled>Update</button>
                        @endif
                    </div>
                </form>
                
                <label for="" class="detailed-description">DETAILED DESCRIPTION OF THE ISSUE</label>
                <textarea name="DetailedDescription" id="" cols="30" rows="8" readonly>{{ $ticket->DetailedDescription }}</textarea>
            </div>
            <div class="right">
                <label for="">PRIORITY LEVEL</label>
                <input type="text" name="Priority" class="form-control" value="{{ $ticket->priority->PriorityDescription }}" readonly>
                <label for="">PC NAME / IP ADDRESS</label>
                <input type="text" name="PC_IP" class="form-control" value="{{ $ticket->PC_IP }}" readonly>
                <label for="">TRANSACTION DATE</label>
                <input type="date" name="TransactionDate" class="form-control"  value="{{ $ticket->created_at->format('Y-m-d') }}" readonly>
                <label for="">APPROVER</label>
                <select name="Approver" id="" required>
                    <option selected>Choose Approver</option>
                    <option value="mespiritu">MIKE JOSHUA ESPIRITU</option>
                    <option value="jlopez">JOSH LOPEZ</option>
                    <option value="mespez">MIJO ESPEZ</option>
                </select>

                <form action="/ticket/{{ $ticket->TicketID }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="hidden" name="hidden_id" value="{{ $ticket->TicketID }}">
                        <label for="">ASSIGNED TO</label><br>
                        <input type="hidden" name="Personnel" value="{{ session('username') }}">
                        @if($ticket->Status == 'Resolved')
                            <input type="text" name="AssignedTo" value="{{ $ticket->AssignedTo }}" readonly>
                            <button class="btn-accept" disabled>Re-assign</button>
                        @else
                            @if($ticket->AssignedTo != NULL)
                                <select name="AssignedTo" id="" required>
                                    <option value="{{ $ticket->AssignedTo }}">{{ $ticket->AssignedTo }}</option>
                                    @foreach($it->where('username', '!=', $ticket->AssignedTo) as $key => $ts)
                                        <option value="{{ $ts->username }}">{{ $ts->username }}</option>
                                    @endforeach
                                    @if(session('username') == 'sa')
                                        <option value="sa">sa</option>
                                    @endif
                                </select>
                                <button class="btn-accept">Re-assign</button>
                            @else
                                <input type="text" name="AssignedTo" value="{{ session('username') }}" readonly>
                                <button class="btn-accept">Accept</button>
                            @endif
                        @endif
                    </div>
                </form>

                <label for="">ATTACHMENT</label>
                {{-- <textarea name="DetailedDescription" id="" cols="30" rows="8" readonly></textarea> --}}
                <a href="{{ $ticket->Attachment }}" target="_blank"><img src="{{ $ticket->Attachment }}" alt="attachment" width="400px" class="image"></a>
            </div>
        </div>

        <div class="bottom-div">
            <label for="">NOTES/MESSAGES</label>
            <div class="bottom-notes">
                <div class="admin-notes-list scroll-bottom">
                    @foreach($notes as $n => $note)
                        <div class="admin-note">
                            <span class="uname"><strong>{{ $note->Sender }}: </strong></span>
                            <span class="note-msg">{{ $note->Message }} </span>
                        </div>
                    @endforeach
                </div>
                <div class="admin-notes-create">
                    <form action="/my-ticket/{{ $ticket->TicketID }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="noteTicket" id="" value="{{ $ticket->TicketID }}">
                        <input type="hidden" name="noteSender" value="{{ session('username') }}">
                        @if($ticket->AssignedTo != session('username'))
                            <textarea name="noteMessage" disabled></textarea>
                            <button class="" disabled>SEND</button>
                        @else 
                            @if($ticket->isClosed == 'Closed')
                                <textarea name="noteMessage" disabled></textarea>
                                <button class="" disabled>SEND</button>
                            @else
                                <textarea name="noteMessage" required></textarea>
                                <button class="">SEND</button>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
        </div>
        
@endsection

{{-- 
<div class="notes-list">
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
        {{-- <input type="text" name="noteTicket" id="" value="{{ $ticket->TicketID }}">
        <input type="text" name="noteSender" value="{{ session('username') }}"> --}}
        {{-- @if($ticket->AssignedTo)
            <textarea name="noteMessage" id="" rows="4"></textarea>
            <button class="btn-comment">SEND</button>
        @else
            <textarea name="noteMessage" id="" rows="4" ></textarea>
            <button class="btn-comment" >SEND</button>
        @endif
    </form>
</div> --}}