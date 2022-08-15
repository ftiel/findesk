<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Notification;
use App\Models\Ticket;
use App\Models\Trail;
use App\Models\User;

class TicketController extends Controller
{
    public function create_ticket(Request $r) {
        $LatestTicket = Ticket::orderBy('created_at', 'DESC')->first();

        if($LatestTicket) {
            $LatestID = $LatestTicket->TicketID;
            $LatestYearMonth = substr($LatestID, 3, 6);
            $LatestTicketCount = substr($LatestID, 9);
            if($LatestYearMonth == today()->format('Ym')) {
                $newTicketCount = today()->format('Ym') . (str_pad(($LatestTicketCount + 1), 4,'0',STR_PAD_LEFT));
            }
            else {
                $newTicketCount = today()->format('Ym') . (str_pad((1), 4,'0',STR_PAD_LEFT));
            }
        }   
        else {
            $newTicketCount = today()->format('Ym') . (str_pad((1), 4,'0',STR_PAD_LEFT));
        }

        $t = new Ticket;
        if($r->TicketType == 1) {
            $TicketType = 'IncidentReport';
            $TicketPrefix = 'INC';
        }
        else {
            $TicketType = 'ServiceRequest';
            $TicketPrefix = 'REQ';
        }
            
        $TID = $TicketPrefix . $newTicketCount;
        
        $t->TicketType = $TicketType;
        $t->TicketID = $TID;
        $t->ClientUsername = $r->ClientUsername;
        $t->Department = $r->Department;
        $t->Category = $r->Category;
        $t->SubCategory = $r->SubCategory;
        $t->SubCategoryDetails = $r->SubCategoryDetails;
        $t->Status = 'Unassigned';
        $t->onBehalfOf = $r->onBehalfOf;
        $t->Priority = $r->hiddenPriority;
        $t->PC_IP = $r->PC_IP;
        $t->TransactionDate = $r->TransactionDate;
        $t->ApprovalStatus = 'Pending';
        $t->Approver = $r->Approver;
        $t->DetailedDescription = $r->DetailedDescription;
        if($r->hasFile('fileAttach')) {
            // $filename = $r->Attachment->getClientOriginalName();
            $fname = $TID . '.' . $r->fileAttach->extension();
            $t->Attachment = '/images/attachment/' . $fname;
            $r->fileAttach->move(public_path('images/attachment'), $fname);
        }
        $t->save();

        $trail = new Trail;
        $trail->TicketID = $TicketPrefix . $newTicketCount;
        $trail->StatusUpdate = 'Unassigned';
        $trail->InsertedBy = $r->ClientUsername;
        $trail->save();

        $admins = User::where('UserType', '!=', 'Normal')->get();
        $ids = [];
        
        foreach($admins as $i => $admin) {
            array_push($ids, $admin->id);
        }

        $notif = new Notification;
        $notif->TicketID = $TID;
        $notif->ReceiverID = implode(",", $ids);
        $notif->SenderID = session('userid');
        $notif->Remarks = 'New ticket created';
        $notif->isSeen = 'N';
        $notif->save();
        return redirect('/');
    }

    public function newNotif($r) {
        return $r;
    }

    public function update_ticket(Request $r) {
        $ticket = Ticket::where('TicketID', $r->hidden_id)->first();
        $trail = new Trail;
        $trail->TicketID = $r->hidden_id;
        
        if($r->Personnel != NULL) {
            if($ticket->AssignedTo == null) {
                $ticket->AssignedTo = $r->Personnel;
            } else {
                $ticket->AssignedTo = $r->AssignedTo;
            }
            $ticket->Status = 'Open';
        }
        else {
            // $trail->StatusUpdate = $r->Status;
            // if($r->isClosed != NULL) {
            if($ticket->Status == 'Resolved') {
                if($r->isClosed != NULL) {
                // if($ticket->Status == 'Resolved') {
                    $ticket->touch();
                }
                $ticket->isClosed = $r->isClosed;
                $trail->isClosed = $r->isClosed; 
            }
            else {
                $ticket->Status = $r->Status;
            }
        }

        $trail->StatusUpdate = $ticket->Status;
        
        $trail->AssignedTo = $ticket->AssignedTo;
        $trail->InsertedBy = session('username');
        $ticket->save();
        $trail->save();
        return redirect()->back();
        // return array([$ticket->Status, $r->Personnel]);
    }

    public function realtime_tickets() {
        $tickets = Ticket::where('isClosed', NULL)->orderBy('id', 'DESC')->get();
        $data = $tickets;
        return response()->json($data);
    }
}
