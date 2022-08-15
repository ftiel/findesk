<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Chart;
use App\Models\Department;
use App\Models\Note;
use App\Models\Personnel;
use App\Models\Priority;
use App\Models\Status;
use App\Models\SubCategory;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;

class PageController extends Controller
{
    public function login() {
        return view('/login');
    }

    public function logout() {
        return view('/login');
    }

    public function index() {
        $status = Status::all();
        $tickets = Ticket::where('ClientUsername', session('username'))->orderBy('id', 'DESC')->get();
        $user = User::where('username', session('username'))->first();
        return view('/index', compact('status', 'tickets', 'user'));
    }

    public function announcements(Request $r) {
        return view('/announcements');
    }

    public function create_ticket($type) {
        if ($type == 1) {
            $categories = Category::where('isIncident', 1)->get();
        } elseif($type == 2) {
            $categories = Category::where('isRequest', 1)->get();
        } else {
            return redirect('/');
        }
        $CurrentUser = User::where('username', session('username'))->first();
        $department = Department::where('id', $CurrentUser->DepartmentID)->first();
        // return $department;
        return view('/new-ticket', compact('categories', 'CurrentUser', 'department', 'type'));
    }

    public function administration(){
        $tc = today()->format('Ym');
        $tickets = Ticket::with('priority')->orderBy('id', 'DESC')->get();
        $closed = $tickets->where('isClosed', 'Closed');
        $status = Status::all();
        $unassigned = $tickets->where('AssignedTo', NULL);
        return view('/administration', compact('tickets', 'tc', 'closed', 'unassigned', 'status'));
    }

    public function view_ticket($TicketID) {
        $ticket = Ticket::with('priority')->where('TicketID', $TicketID)->first();
        $stats = Status::where('id', '!=', 1)->get();
        $it = Personnel::all();
        $priority = Priority::all();
        $category = Category::where('id', $ticket->Category)->first();
        $subcat = SubCategory::where('id', $ticket->SubCategory)->first();
        $notes = Note::where('TicketID', $ticket->TicketID)->get();
        return view('/view-ticket', compact('ticket', 'it', 'stats', 'category', 'notes', 'priority', 'subcat'));
    }

    public function user_ticket($TicketID) {
        $ticket = Ticket::with('priority')->where('TicketID', $TicketID)->first();
        $notes = Note::where('TicketID', $ticket->TicketID)->get();
        return view('/user-ticket', compact('notes', 'ticket'));
    }
    
    public function list_tickets(Request $r, $param) {
        $a = '';

        $tickets = Ticket::with('priority')->when($param == 'open', function ($q) {
            $q->where('isClosed', null);
        })
        ->when(in_array($param, ['unassigned', 'resolved']), function ($q) use ($param) {
            $q->where('Status', $param);
        })
        ->when(!in_array($param, ['open', 'all', 'unassigned', 'resolved']), function ($q) use ($param) {
            $q->where('AssignedTo', $param);
        })
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('/tickets', compact('tickets'));
    }

    public function reports(Request $r) {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $status = Status::all();
        $priority = Priority::all();
        $charts = Chart::all();
        return view('/reports', compact('categories', 'subCategories', 'status', 'priority','charts'));
    }

    public function add_user() {
        $depts = Department::all();
        $users = User::all();
        return view('partial.add_user', compact('depts', 'users'));
    }

    public function change_password() {
        $user = User::where('username', session('username'))->first();
        return view('change-password', compact('user'));
    }

    public function reset_user_password() {
        $user = User::where('username', session('username'))->first();
        return view('reset-user-password', compact('user'));
    }
}
