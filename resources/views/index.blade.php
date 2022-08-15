@extends('layouts.main-layout')

@section('content')
        {{-- shell_exec("WMIC COMPUTERSYSTEM GET USERNAME")
        {{ str_replace("UserName FINDEN","", shell_exec("WMIC COMPUTERSYSTEM GET USERNAME"))  }} 123
        {{ shell_exec("echo %username%") }} --}}
        
        <div class="hero">
            <div class="actions">
                <h4>Hello, <span style="color: green">{{ $user->name }}</span></h4>
                <h3>WELCOME TO FINDEN & ELGRADE ITHELPDESK</h3>
                <h5>How can we help you today?</h5>
                <a href="/new-ticket/1" class="btn-primary btn-incident">REPORT AN INCIDENT</a>
                <br>
                <a href="/new-ticket/2" class="btn-primary btn-service">REQUEST A SERVICE</a>
                <br>
                or<br>
                <a href="#ticket-wrapper" id="ticket-toggle" onclick="clickTicket()" >I just want to view my tickets</a>
            </div>
            <div>
                <!-- FUTURE ANNOUNCEMENTS WILL BE DISPLAYED HERE -->
                <div class="announcement" style="height: 700px">
                    <center>
                        <h2>IMPORTANT ANNOUNCEMENTS</h2>
                        <h3>WILL BE POSTED HERE!</h3>
                    </center>
                    <div class="announcement-">

                        <br><br><br>
                        {{-- <div class="text">
                            <ul class="steps">
                                <li>Stay Tuned!
                                    <br><br>
                                    <p>Please stay updated for future announcements.</p>
                                    <p>All announcements of the IT Department will be posted here.</p>
                                </li>
                            </ul>
                        </div> --}}
                        <img src="/images/IncReq.jpg" alt="">
                    </div>
                </div>

            </div>
        </div>

        <br id="br0001">
        <br>
        <hr>

        <div class="ticket-wrapper" id="ticket-wrapper">
            <div class="side"></div>
            <div class="my-tickets">

        <div class="tab">
            @foreach($status as $key => $stat)
                    <button class="tablinks" onclick="openCategoryTab('{{ $stat->StatusName }}', 'tab-cat-{{ $key }}')" id="tab-cat-{{ $key }}">{{ $stat->StatusName }}</button>
            @endforeach

            {{-- <ul class="t-cat cat-tabs">
                @foreach($status as $key => $stat)
                    @if($loop->first)
                        <li class="active"><a href="#home">Home</a></li>
                    @else
                        <li><a href="#menu1">Menu 1</a></li>
                    @endif
                @endforeach
            </ul> --}}
            
            {{-- <button class="tablinks" onclick="openCategoryTab(event, 'NewYork')" id="defaultOpen">Unassigned</button>
            <button class="tablinks" onclick="openCategoryTab(event, 'London')">Open</button>
            <button class="tablinks" onclick="openCategoryTab(event, 'Paris')">Resolved</button>--}}
            {{-- <button class="tablinks" onclick="openCategoryTab(event, 'Tokyo')">CancelledTEST</button>  --}}
        </div>
        @foreach($status as $stat)
            <div id="{{ $stat->StatusName }}" class="tabcontent">
                @forelse($tickets->where('Status', $stat->StatusName ) as $ticket)
                    <div class="ticket-loop">
                        <div class="tabconent-left">
                            <a href="/my-ticket/{{ $ticket->TicketID }}"><h3>{{ $ticket->TicketID }}</h3></a>
                            <h5>{{ $ticket->created_at }}</h5>
                            <p>{{ $ticket->DetailedDescription }}</p>
                        </div>
                        <div class="tabcontent-right">
                            <img src="{{ $ticket->Attachment }}" alt="ticket-attachment" width="300px">
                        </div>
                        <hr><hr>
                    </div>
                @empty
                    <div>
                        <h1 class="no-data-found">No data found.</h1>
                    </div>
                @endforelse
            </div>
        @endforeach

{{-- 
        <div id="Tokyo" class="tabcontent">
            @forelse($tickets->where('Status', 'Unassigned') as $ticket)
                <div class="ticket-loop">
                    <div class="tabconent-left">
                        <a href="###"><h3>{{ $ticket->TicketID }}</h3></a>
                        <h5>{{ $ticket->created_at }}</h5>
                        <p>{{ $ticket->DetailedDescription }}</p>
                    </div>
                    <div class="tabcontent-right">
                        <img src="" alt="ticket-attachment">
                    </div>
                    <hr><hr>
                </div>
            @empty
                <h1 class="no-data-found">No data found.</h1>
            @endforelse
        </div> --}}

       {{--  <div id="London" class="tabcontent">
            @forelse($tickets->where('Status', 'Open') as $ticket)
                <div class="ticket-loop">
                    <div class="tabconent-left">
                        <a href="###"><h3>{{ $ticket->TicketID }}</h3></a>
                        <h5>{{ $ticket->created_at }}</h5>
                        <p>{{ $ticket->DetailedDescription }}</p>
                    </div>
                    <div class="tabcontent-right">
                        <img src="" alt="ticket-attachment">
                    </div>
                    <hr><hr>
                </div>
            @empty
                <h1 class="no-data-found">No data found.</h1>
            @endforelse
        </div>

        <div id="Paris" class="tabcontent">
            @forelse($tickets->where('Status', 'Resolved') as $ticket)
                <div class="ticket-loop">
                    <div class="tabconent-left">
                        <a href="###"><h3>{{ $ticket->TicketID }}</h3></a>
                        <h5>{{ $ticket->created_at }}</h5>
                        <p>{{ $ticket->DetailedDescription }}</p>
                    </div>
                    <div class="tabcontent-right">
                        <img src="" alt="ticket-attachment">
                    </div>
                    <hr><hr>
                </div>
            @empty
                <h1 class="no-data-found">No data found.</h1>
            @endforelse
        </div>

        <div id="Tokyo" class="tabcontent">
            @forelse($tickets->where('Status', 'Cancelled') as $ticket)
                <div class="ticket-loop">
                    <div class="tabconent-left">
                        <a href="###"><h3>{{ $ticket->TicketID }}</h3></a>
                        <h5>{{ $ticket->created_at }}</h5>
                        <p>{{ $ticket->DetailedDescription }}</p>
                    </div>
                    <div class="tabcontent-right">
                        <img src="" alt="ticket-attachment">
                    </div>
                    <hr><hr>
                </div>
            @empty
                <h1 class="no-data-found">No data found.</h1>
            @endforelse
        </div> --}}
            </div>
            <div class="side">
            </div>
        </div>
@endsection